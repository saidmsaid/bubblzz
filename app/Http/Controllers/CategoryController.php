<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $data = ['categories' => Category::whereNull('parent_id')->get()];
        return view('admin.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = Category::all();
        return view('admin.category.create')->with('mainCategories', $mainCategories);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->input('category_name');
        if($request->input('category_name_ar') == null){
            $category->name_ar = '';
        }else
            $category->name_ar = $request->input('category_name_ar');

        if($request->hasFile('image')){
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/categories', $fileNameToStore);
            $category->image = $fileNameToStore;
        }

        if($request->input('category_description') == null){
            $category->description = '';
        }else
            $category->description = $request->input('category_description');

        if($request->input('category_description_ar') == null){
            $category->description_ar = '';
        }else
            $category->description_ar = $request->input('category_description_ar');
        $category->save();
        $category->category_slug = str_slug($category->name, '-') . '-' . $category->id;
        /*         * ******************************* */
        $category->update();

        return redirect()->route('category.index')->with('success', 'The new category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('admin.category.edit')->with($data);
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
           'category_name' => 'required '
        ]);

            $category = Category::find($id);
            $category->name = $request->input('category_name');

            if($request->input('category_name_ar') == null){
                $category->name_ar = '';
            }else
                $category->name_ar = $request->input('category_name_ar');

            if($request->hasFile('image')){
                if($category->image != 'noImage.png'){
                    Storage::delete('public/categories' . $category->image);
                }
                $fileExt = $request->image->getClientOriginalExtension();
                $fileNameToStore = uniqid('', true) . '.' . $fileExt;
                $request->image->storeAs('public/categories', $fileNameToStore);
                $category->image = $fileNameToStore;
            }

            if($request->input('category_description') == null){
                $category->description = '';
            }else
                $category->description = $request->input('category_description');


            if($request->input('category_description_ar') == null){
                $category->description_ar = '';
            }else
                $category->description_ar = $request->input('category_description_ar');


            $category->save();
            $category->category_slug = str_slug($category->name, '-') . '-' . $category->id;
            $category->update();
        return redirect()->route('category.index')->with('success', 'The new category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cat_id = $request->input('catId');
        $category = Category::find($cat_id);
//        return $category;
        $products = $category->products;
        foreach ($products as $product){
            $product->delete();
        }
        foreach ($category->children as $child){
            $child->delete();
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'The category has been deleted');
    }
}
