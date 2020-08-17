<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
class StateController extends Controller
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
        $states = State::all();
        return view('admin.state.index',['states'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.state.create');
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
            'state_name' => 'required|string|max:50',
            'state_code' => 'required|string|max:50',
        ];
        $name = [
            'state_name' => 'State Name',
            'state_code' => 'State Code',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $state = State::create($data);
        return redirect()->route('state.index')->with('success', 'The new state has been added');
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
        $state = State::findOrFail($id);
        return view('admin.state.edit',['state'=>$state]);
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
        $state= State::findOrFail($id);
        $rule = [
            'state_name' => 'required|string|max:50',
            'state_code' => 'required|string|max:50',
        ];
        $name = [
            'state_name' => 'State Name',
            'state_code' => 'State Code',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $state->update($data);
         return redirect()->route('state.index')->with('success', 'The state has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $city = City::where('state_id',$id)->delete();
        $state->delete();
         return redirect()->route('state.index')->with('success', 'The state has been Deleted');
    }
}
