<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubCategory;
use App\image;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['categories'=> Category::whereNull('parent_id')->get()/*, 'subcategories'=>Brand::all()*/];
        return view('admin.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $this->validate($request, [
            'name' => 'required',
         //   'brand' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product;

        $product->name = $request->input('name');

        if($request->input('name_ar') == null){
            $product->name_ar = '';
        }else
            $product->name_ar = $request->input('name_ar');

        if($request->input('youtube_link') == null){
            $product->youtube_link = '';
        }else{
            $link = preg_replace('/watch\?v=/', 'embed/', $request->input('youtube_link'));
            $product->youtube_link = $link;
        }

        if($request->input('small_description') == null){
            $product->small_description = '';
        }else
            $product->small_description = $request->input('small_description');

        if($request->input('small_description_ar') == null){
            $product->small_description_ar = '';
        }else
            $product->small_description_ar = $request->input('small_description_ar');

        if($request->input('full_description') == null){
            $product->full_description = '';
        }else
            $product->full_description = $request->input('full_description');

        if($request->input('full_description_ar') == null){
            $product->full_description_ar = '';
        }else
            $product->full_description_ar = $request->input('full_description_ar');

        if($request->input('product_directions') !== null){
            $product->product_directions = $request->input('product_directions');
        }
            

        if($request->input('full_description_ar') == null){
            $product->product_Ingredients = $request->input('product_Ingredients');
        }
            

        if($request->input('product_code') == null){
            $product->product_code = null;
        }else
            $product->product_code = $request->input('product_code');

        if($request->input('price') != null){
            $product->price = $request->input('price');
        }


        if($request->input('recent') == null){
            $product->recent = '0';
        }else
            $product->recent = $request->input('recent');

        if($request->input('featured') == null){
            $product->featured = '0';
        }else
            $product->featured = $request->input('featured');

        if($request->input('special') == null){
            $product->special = '0';
        }else
            $product->special = $request->input('special');

        if($request->input('offer') == null){
            $product->offer = '0';
        }else
            $product->offer = $request->input('offer');

        $product->brand_id = 0;//$request->input('brand');

        $product->category_id = $request->input('category_id');
        $parent_category_id = Category::where('id',$request->category_id)->first();
        if($parent_category_id->parent_id !== null)
        {
            $product->parent_category_id = $parent_category_id->parent_id;
        }else{
            $product->parent_category_id = $request->category_id;
        }

        if($request->input('sold') == null){
            $product->sold = 0;
        }else
            $product->sold = $request->input('sold');
        

        if($request->hasFile('product_image')) {
            $fileExt = $request->product_image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->product_image->storeAs('public/products', $fileNameToStore);
            $product->default_image = $fileNameToStore;

        }else{
            $product->default_image = 'noImage.png';
        }

        $product->save();
        $product->product_slug = str_slug($product->name, '-') . '-' . $product->id;
        /*         * ******************************* */
        $product->update();
        return redirect()->route('product.index')->with('success', 'The product Created successfully');
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
        $data = ['product'=> Product::find($id), 'categories'=> Category::all() /*,'brands'=> Brand::all()*/];
        
        return view('admin.product.edit')->with($data);
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
        
        $this->validate($request, [
            'name' => 'required',
            //'brand' => 'required',
            'category_id' => 'required',
        ]);
//        return $request;

        $product = Product::find($id);
        //$product->sold = $request->input('sold');
        $product->name = $request->input('name');

        if($request->input('name_ar') == null){
            $product->name_ar = '';
        }else
            $product->name_ar = $request->input('name_ar');

        if($request->input('youtube_link') == null){
            $product->youtube_link = '';
        }else{
            $link = preg_replace('/watch\?v=/', 'embed/', $request->input('youtube_link'));
            $product->youtube_link = $link;
        }

        if($request->input('small_description') == null){
            $product->small_description = '';
        }else
            $product->small_description = $request->input('small_description');

        if($request->input('small_description_ar') == null){
            $product->small_description_ar = '';
        }else
            $product->small_description_ar = $request->input('small_description_ar');

        if($request->input('price') != null){
            $product->price = $request->input('price');
        }

        if($request->input('full_description') == null){
            $product->full_description = '';
        }else
            $product->full_description = $request->input('full_description');

        if($request->input('full_description_ar') == null){
            $product->full_description_ar = '';
        }else
            $product->full_description_ar = $request->input('full_description_ar');
        
        if($request->input('product_directions') == null){
            $product->product_directions = null;
        }else
            $product->product_directions = $request->input('product_directions');

        if($request->input('product_Ingredients') == null){
            $product->product_Ingredients = null;
        }else
            $product->product_Ingredients = $request->input('product_Ingredients');

        if($request->input('product_code') == null){
            $product->product_code = null;
        }else
            $product->product_code = $request->input('product_code');


        if($request->input('recent') == null || $request->input('recent') == 0){
            $product->recent = '0';
        }else
            $product->recent = $request->input('recent');


        if($request->input('featured') == null || $request->input('featured') == 0){
            $product->featured = '0';
        }else
            $product->featured = $request->input('featured');

        if($request->input('special') == null || $request->input('special') == 0){
            $product->special = '0';
        }else
            $product->special = $request->input('special');

        if($request->input('sold') == null ){
            $product->sold = 0;
        }else
            $product->sold = 1;


        if($request->input('offer') == null || $request->input('offer') == 0){
            $product->offer = '0';
        }else
            $product->offer = $request->input('offer');
        $product->brand_id = 0;
        $product->category_id = $request->input('category_id');
        $parent_category_id = Category::where('id',$request->category_id)->first();
        if($parent_category_id->parent_id !== null)
        {
            $product->parent_category_id = $parent_category_id->parent_id;
        }else{
            $product->parent_category_id = $request->category_id;
        }
        if($request->hasFile('product_image')) {
            if($product->image != 'noImage.png'){
                Storage::delete('public/categories' . $product->image);
            }
            $fileExt = $request->product_image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->product_image->storeAs('public/products', $fileNameToStore);
            $product->default_image = $fileNameToStore;

        }
        $product->product_slug = str_slug($product->name, '-') . '-' . $product->id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'The product have been updated successfully');

//
    }

    public function editImages ($product) {
        $data = [
            'images' => image::where('product_id', $product)->get(),
            'product_id' => $product
        ];
//        dd($images);
        return view('admin.product.editImages')->with($data);
    }

    public function saveImage (Request $request, $product) {
        $this->validate($request, [
           'image' => 'required'
        ]);
        if($request->hasFile('image')) {
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/products', $fileNameToStore);

            $image = new image;
            $image->image_name = $fileNameToStore;
            $image->product_id = $product;
            $image->save();
        }

        $data = [
            'images' => image::where('product_id', $product)->get(),
            'product_id' => $product
        ];
        return redirect()->route('product.editImages', $product)->with($data);
    }

    public function deleteImage (Request $request, $product){
        $imageProductId = $request->input('imageID');
        $image = image::find($imageProductId);
        $image->delete();
        $data = [
            'images' => image::where('product_id', $product)->get(),
            'product_id' => $product
        ];
        return redirect()->route('product.editImages', $product)->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_id = $request->input('productId');
        $product = Product::find($product_id);
//        return $product;
        $product_images = $product->images;
//        return $product_images;
        foreach ($product_images as $product_image){
            Storage::delete('public/products/'.$product_image->image_name);
            $product_image->delete();
        }

        $product->delete();
        return redirect()->route('product.index')->with('success', 'The product have been deleted successfully');
    }
    public function reviews($id)
    {
        $reviews  = Review::where('commentable_id',$id)->get();
         return view('admin.product.reviews',['reviews'=>$reviews]);
    }
    public function reviewsdestroy($id)
    {
         $reviews  = Review::where('id',$id)->delete();
         return redirect()->back()->with('success', 'Review have been deleted successfully');
    }
}
