<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = 'state_id';

    protected $fillable = ['state_name','state_code'];

     
    public function city()
    {
        return $this->hasMany('App\City');
    }
      public function customer()
    {
        return $this->hasMany('App\Customer');
    }
    
}
