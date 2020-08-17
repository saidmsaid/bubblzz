<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
    						'body',
    						'rate',
    						'name',
    						'commentable_id',
    						'commentable_type'
    					  ];

   public function commentable(){
        return $this->morphTo();
   }
     					  

    public function customer(){
        return $this->hasOne('App\Customer' , 'id' ,'customer_id');
    }  
}
