<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    protected $fillable = ['product_id','customer_id'];

    
    public function product()
	{
    	return $this->hasMany('App\Product','id','product_id');
	}
}
