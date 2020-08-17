<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
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
        $about = About::first();
        return view('admin.about.index')->with('about', $about);
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit')->with('about', $about);
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
        $this->validate($request,[
            'image' => 'image|max:8192',
            'title' => 'required',
            'about' => 'required',
        ]);

        $about = About::find($id);
        $about->title = $request->input('title');

        if($request->input('title') == null){
            $about->title = '';
        }else
            $about->title = $request->input('title');


        if($request->input('title_ar') == null){
            $about->title_ar = '';
        }else
            $about->title_ar = $request->input('title_ar');


        if($request->input('about') == null){
            $about->about = '';
        }else
            $about->about = $request->input('about');


        if($request->input('about_ar') == null){
            $about->about_ar = '';
        }else
            $about->about_ar = $request->input('about_ar');


        if($request->hasFile('image')){
            if($about->image != 'noImage.png'){
                Storage::delete('public/about/'.$about->image);
            }
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/about', $fileNameToStore);
        }else
            $fileNameToStore = 'noImage.png';


        $about->image = $fileNameToStore;
        $about->save();


        return redirect()->route('about.index')->with('success', 'The About have been Updated');
    }
}
