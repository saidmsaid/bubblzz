<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable = ['order_id','quantity','product_id'];
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
