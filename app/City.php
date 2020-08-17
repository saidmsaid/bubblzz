<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $primaryKey = 'city_id';

    protected $fillable = ['city_name','city_shippingPrice','state_id'];

     public function state()
    {
        return $this->belongsTo('App\State','state_id');
    }
      public function customer()
    {
        return $this->hasMany('App\Customer');
    }
}
