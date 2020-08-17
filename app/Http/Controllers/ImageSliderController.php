<?php

namespace App\Http\Controllers;

use App\Imageslider;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageSliderController extends Controller
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
        $imageSliders = Imageslider::all();
        return view('admin.imageSlider.index')->with('imageSliders', $imageSliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imageSliders = Imageslider::all();
        return view('admin.imageSlider.create')->with('imageSliders', $imageSliders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
            
        ]);

        $imageSlider = new Imageslider;

        $imageSlider->text = $request->input('text');

        if($request->input('text_ar') == null){
            $imageSlider->text_ar = '';
        }else
            $imageSlider->text_ar = $request->input('text_ar');



        if($request->input('description_') == null){
            $imageSlider->description = '';
        }else
            $imageSlider->description = $request->input('description');




        if($request->input('description_ar') == null){
            $imageSlider->description_ar = '';
        }else
            $imageSlider->description_ar = $request->input('description_ar');


        $fileExt = $request->image->getClientOriginalExtension();
        $fileNameToStore = uniqid('', true) . '.' . $fileExt;
        $request->image->storeAs('public/imageSlider', $fileNameToStore);
        $imageSlider->image = $fileNameToStore;
        $imageSlider->order = $request->input('order');
        $imageSlider->save();
        return redirect()->route('imageslider.index')->with('success', 'the imageSlider have been added');
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
        $data = ['imageSlider' => Imageslider::find($id), 'imageSliders' => Imageslider::all()];
        return view('admin.imageSlider.edit')->with($data);
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
            'image' => 'image',
           
        ]);
        $imageSlider = Imageslider::find($id);
        $imageSlider->text = $request->input('text');
        if($request->input('text_ar') == null){
            $imageSlider->text_ar = '';
        }else
            $imageSlider->text_ar = $request->input('text_ar');


        $imageSlider->description = $request->input('description');
        if($request->input('description_ar') == null){
            $imageSlider->description_ar = '';
        }else
            $imageSlider->description_ar = $request->input('description_ar');

        if($request->hasFile('image')){
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/imageSlider', $fileNameToStore);
            Storage::delete('public/imageSlider/'.$imageSlider->image);
            $imageSlider->image = $fileNameToStore;
        }
        $imageSlider->order = $request->input('order');
        $imageSlider->save();
        return redirect()->route('imageslider.index')->with('success', 'the imageSlider have been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageSlider = Imageslider::find($id);
        Storage::delete('public/imageSlider/' . $imageSlider->image);
        $imageSlider->delete();
        return redirect()->route('imageslider.index')->with('success', 'The imageSlider have been deleted');
    }
}
