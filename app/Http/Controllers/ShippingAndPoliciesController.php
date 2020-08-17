<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShippingAndPolicy;
class ShippingAndPoliciesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
    	$shipping = ShippingAndPolicy::first();
    	return view('admin.shipping&policy.index',['terms'=>$shipping]);
    }
    public function update(Request $request)
    {
    	$rules=[
    		'shipping_title'=>'required|string',
    		'shipping_text'=>'required|string',
    		'policies_title'=>'required|string',
    		'policies_text'=>'required|string',
    	];
    	$name = [
    		'shipping_title'=>'Shipping Title',
    		'shipping_text'=>'Shipping Text',
    		'policies_title'=>'Policies Title',
    		'policies_text'=>'Policies Text',
    	];
    	$data = $this->validate($request,$rules,[],$name);
    	$shipping = ShippingAndPolicy::first();
    	$shipping->update($data);
    	return redirect()->route('shipping.policies')->with('success', 'Shipping And Policies Updated Successfully');
    }
}
