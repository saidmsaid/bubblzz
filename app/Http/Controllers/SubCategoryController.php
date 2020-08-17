<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class SubCategoryController extends Controller
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
         $data = ['categories' => Category::whereNotNull('parent_id')->get()];
        return view('admin.subcategory.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = Category::whereNull('parent_id')->get();
        return view('admin.subcategory.create')->with('categories', $mainCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' =>  'required|string',
            'category_id'   =>  'required|Integer|exists:categories,id',
        ];
        $name= [
            'category_name'=>'subcategory Name',
            'category_id'=>'Category',
        ];
        if($request->has('category_name_ar') && $request->category_name_ar )
        {
            $rules['category_name_ar']      =   'required|string';
        }
        if($request->has('category_description') && $request->category_description )
        {
            $rules['category_description']      =   'required|string';
        }
        if($request->has('category_description_ar') && $request->category_description_ar )
        {
            $rules['category_description_ar']      =   'required|string';
        }
        if($request->has('image') && $request->image )
        {
            $rules['image']      =   'required|image|mimes:jpeg,jpg,png,bmp,gif|max:8192';
        }
        $data=$this->validate($request,$rules,[],$name);
        if( $request->category_name_ar === null )
        {
            $data['category_name_ar']      =   null;
        }
        if($request->category_description === null )
        {
            $data['category_description']      =   null;
        }
        if( $request->category_description_ar === null )
        {
            $data['category_description_ar']      =   null;
        }
        if($request->hasFile('image')){
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/categories', $fileNameToStore);
            $data['image'] = $fileNameToStore;
        }else{
            $data['image'] = 'noImage.png';
        }
       $subcategory = Category::create([
            'name'  =>  $data['category_name'],
            'name_ar'  =>  $data['category_name_ar'],
            'description'  =>  $data['category_description'],
            'description_ar'  =>  $data['category_description_ar'],
            'image'  =>  $data['image'],
            'parent_id'  =>  $data['category_id'],
        ]);
       $subcategory->update(['category_slug'=> str_slug($subcategory->name, '-') . '-' . $subcategory->id]);
       return redirect()->route('subcategory.index')->with('success', 'The new subcategory has been added');
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
        $data = ['category'=> Category::find($id)];
        $mainCategories = Category::whereNull('parent_id')->get();
        return view('admin.subcategory.edit')->with($data)->with('categories', $mainCategories);
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
        $subcategory = Category::findOrFail($id);
        $rules = [
            'category_name' =>  'required|string',
            'category_id'   =>  'required|Integer|exists:categories,id',
        ];
        $name= [
            'category_name'=>'subcategory Name',
            'category_id'=>'Category',
        ];
        if($request->has('category_name_ar') && $request->category_name_ar )
        {
            $rules['category_name_ar']      =   'required|string';
        }
        if($request->has('category_description') && $request->category_description )
        {
            $rules['category_description']      =   'required|string';
        }
        if($request->has('category_description_ar') && $request->category_description_ar )
        {
            $rules['category_description_ar']      =   'required|string';
        }
        if($request->has('image') && $request->image )
        {
            $rules['image']      =   'required|image|mimes:jpeg,jpg,png,bmp,gif|max:8192';
        }
        $data=$this->validate($request,$rules,[],$name);
        if( $request->category_name_ar === null )
        {
            $data['category_name_ar']      =   null;
        }
        if($request->category_description === null )
        {
            $data['category_description']      =   null;
        }
        if( $request->category_description_ar === null )
        {
            $data['category_description_ar']      =   null;
        }
        if($request->hasFile('image')){
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/categories', $fileNameToStore);
            $data['image'] = $fileNameToStore;
        }else{
            $data['image'] = $subcategory->image;
        }
       $subcategory->update([
            'name'  =>  $data['category_name'],
            'name_ar'  =>  $data['category_name_ar'],
            'description'  =>  $data['category_description'],
            'description_ar'  =>  $data['category_description_ar'],
            'image'  =>  $data['image'],
            'parent_id'  =>  $data['category_id'],
            'category_slug'=> str_slug($data['category_name'], '-') . '-' . $subcategory->id
        ]);
       return redirect()->route('subcategory.index')->with('success', 'The  subcategory has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $category = Category::findOrFail($id);
//        return $category;
        $products = $category->products;
        foreach ($products as $product){
            $product->delete();
        }
        $category->delete();
        return redirect()->route('subcategory.index')->with('success', 'The subcategory has been deleted');
    }
}
