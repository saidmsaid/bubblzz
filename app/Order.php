<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable  = ['customer_id','status','session_id','city_shippingPrice','totalPrice','name','email','address','mobile','city_id','city_name','state_name','state_id','subtotal','coupon','coupon_value'
];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }
    public function ordproducts(){
        return $this->hasMany('App\OrderProduct','order_id');
    }
}
