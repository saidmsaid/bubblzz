<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
class CityController extends Controller
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
         $cities = City::all();
        return view('admin.city.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.city.create',['states'=>$states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'city_name' =>'required|max:50',
            'city_shippingPrice' =>'required|numeric',
            'state' => 'required|integer|exists:states,state_id',
        ];
        $name = ['city_name' => 'City Name','city_shippingPrice' => 'Shipping Price'];
        $data = $this->validate(request(),$rule,[],$name);
        $data['state_id'] = $data['state'];
        $city = City::create($data);
         return redirect()->route('city.index')->with('success', 'The new city has been added');
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
        $city = City::findOrFail($id);
        $state = State::all();
        return view('admin.city.edit',['city' => $city,'states' => $state]);
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
        $city = City::findOrFail($id);
         $rule = [
            'city_name' =>'required|max:50',
            'city_shippingPrice' =>'required|numeric',
            'state' => 'required|integer|exists:states,state_id',
        ];
        $name = ['city_name' => 'City Name','city_shippingPrice' => 'Shipping Price'];
        $data = $this->validate(request(),$rule,[],$name);
         $data['state_id'] = $data['state'];
        $city->update($data);
         return redirect()->route('city.index')->with('success', 'The city has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('city.index')->with('success', 'The city has been Deleted');
    }
}
