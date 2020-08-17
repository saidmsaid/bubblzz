<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
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
        $brands = Brand::all();
        return view('admin.brand.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
        ]);

        $brand = new Brand;
        $brand->name = $request->input('brand_name');
        if($request->input('brand_name_ar') == null){
            $brand->name_ar = '';
        }else
            $brand->name_ar = $request->input('brand_name_ar');
        if($request->hasFile('brand_image')) {
            $fileExt = $request->brand_image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->brand_image->storeAs('public/brands', $fileNameToStore);
            $brand->image = $fileNameToStore;
        }
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'The brad have been created');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with('brand', $brand);
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
            'brand_name' => 'required',
            'brand_image' => 'image|max:1999',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->input('brand_name');
        if($request->input('brand_name_ar') == null){
            $brand->name_ar = '';
        }else
            $brand->name_ar = $request->input('brand_name_ar');
        if($request->hasFile('brand_image')){

            Storage::delete('public/brands/'.$brand->image);

            $fileExt = $request->brand_image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->brand_image->storeAs('public/brands', $fileNameToStore);

            $brand->image = $fileNameToStore;
        }
        $brand->save();


        return redirect()->route('brand.index')->with('success', 'The brad have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand_id = $request->input('brandId');
        $brand = Brand::find($brand_id);
        Storage::delete('public/brands/'.$brand->image);
        $products = $brand->products;
//        return $products;
        foreach ($products as $product){
            $product->delete();
        }
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'The brad have been deleted');
    }
}
