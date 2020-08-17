<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = ['current','product_id','quantity','totalprice'];

    
    public function product()
	{
    	return $this->hasMany('App\Product','id','product_id');
	}
    protected $hidden =   ['current'];
}
