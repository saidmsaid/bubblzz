<?php

namespace App\Http\Controllers;

use App\Customer;
use App\State;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\CustomerExport;
use Excel;
class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('admin.customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::all();
        $city = City::all();
        return view('admin.customer.create',['states'=>$state,'cities'=>$city]);
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
           'name' => 'required',
           'mobile' => 'required|numeric',
           'address1' => 'required',
           'state' => 'required',
           'city' => 'required',
        ]);
        $customer = new Customer;
        $customer->name = $request->input('name');
        if($request->input('email') !== null){
            $customer->email = $request->input('email');
        }
        $customer->mobile = $request->input('mobile');
        $customer->address1 = $request->input('address1');
        if($request->input('address2') != null){
            $customer->address2 = $request->input('address2');
        }
        if($request->input('address3') != null){
            $customer->address3 = $request->input('address3');
        }
        if($request->input('address4') != null){
            $customer->address4 = $request->input('address4');
        }
        $customer->state_id = $request->input('state');
        $customer->city_id = $request->input('city');
       
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'You added a new customer');
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
        $customer = Customer::find($id);
        $state = State::all();
        $city = City::all();
        return view('admin.customer.edit')->with('customer', $customer)->with('states', $state)->with('cities', $city);
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
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->mobile = $request->input('mobile');
        $customer->address1 = $request->input('address1');
        if($request->input('address2') != null){
            $customer->address2 = $request->input('address2');
        }
        if($request->input('address3') != null){
            $customer->address3 = $request->input('address3');
        }
        if($request->input('address4') != null){
            $customer->address4 = $request->input('address4');
        }
        $customer->state_id = $request->input('state');
        $customer->city_id = $request->input('city');
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'The data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer_id = $request->input('customerId');
        $customer = Customer::find($customer_id);
//        return $customer->orders;
        foreach ($customer->orders as $order){
            $order->delete();
        }
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'The customer has been deleted successfully');
    }
    public function export()
    {
       return Excel::download(new CustomerExport, 'customers.xlsx');
    }
}
