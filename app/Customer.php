<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	protected $fillable  = ['name','email','mobile','address1','address2','address3','address4','session_id','state_id','city_id','password','shipaddress'];
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function state()
    {
        return $this->belongsTo('App\State','state_id');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
    public function comments(){
        return $this->morphMany('App\Review','commentable');
    }
    protected $hidden = [
        'password', 'remember_token','session_id',
    ];

}
