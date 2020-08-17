<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupons;
class CouponsController extends Controller
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
        $coupons = Coupons::all();
        return view('admin.coupon.index',['coupons'=>$coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
                    'code'          =>  'required|string|max:6|unique:coupons,code',
                    'code_value'    =>  'required|numeric',
                ];
        $name = [
        'code'           => 'Coupon Code',
        'code_value'        => 'Coupon Percentage',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $coupon = Coupons::create($data);
        return redirect()->route('coupon.index')->with('success', 'New coupon has been added');
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
         $coupon = Coupons::findorfail($id);
        return view('admin.coupon.edit',['coupon'=>$coupon]);
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
        $rule = [
                    'code'          =>  'required|string|max:6|unique:coupons,code,'.$id,
                    'code_value'    =>  'required|numeric',
                    'status'    =>  'required|string|in:approved,suspended',
                ];
        $name = [
        'code'           => 'Coupon Code',
        'code_value'        => 'Coupon Percentage',
        'status'        => 'Coupon Status',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $coupon = Coupons::where('id',$id)->update($data);
         return redirect()->route('coupon.index')->with('success', ' Coupon has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupons::findOrFail($id);
        $coupon->delete();
         return redirect()->route('coupon.index')->with('success', 'Coupon has been deleted');
    }
}
