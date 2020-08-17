<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit',['banner'=>$banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $rule = [
            
            
            ];
            if($request->banner_link !== null)
            {
                $rule['banner_link']   = 'url';
            }
            if($request->has('banner_path') && $banner->id !== 3)
            {
                $rule['banner_path']   = 'image|mimes:jpeg,jpg,png,bmp,gif|max:2048';
            }else{
                $rule['banner_path']   = 'required|mimes:mp4,avi,flv,wmv,gif,mkv';
                
            }
        $name = [
                    'banner_path'   => 'Banner ',
                    'banner_link'   => 'Banner link',
                ];
        $data = $this->validate(request(),$rule,[],$name);
        if($request->banner_link === null )
        {
            $data['banner_link'] = null;
        }
        if($request->hasFile('banner_path')){
            
            $fileExt = $request->banner_path->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->banner_path->storeAs('public/banner', $fileNameToStore);
            Storage::delete('public/banner/'.$banner->banner_path);
            $data['banner_path'] = $fileNameToStore;
        }
        $banner->update($data);
        return redirect()->route('banner.index')->with('success', 'the banner has been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $banner = Banner::findOrFail($id);
        if($banner->banner_path !== null){
            
            Storage::delete('public/banner/'.$banner->banner_path);
            $banner->update(['banner_path'=>null]);
        }
        
        return redirect()->route('banner.index')->with('success', 'the banner image has been deleted');        
    }
}
