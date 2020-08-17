<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','name_ar','small_description','small_description_ar','full_description','full_description_ar','product_directions','product_Ingredients','price','offer','brand_id','category_id','parent_category_id','featured','special','recent','sold','youtube_link','default_image','product_code','product_slug'];
    public function Category () {
        return $this->belongsTo('App\Category');
    }

    public function images () {
        return $this->hasMany('App\image');
    }

    public function brand (){
        return $this->belongsTo('App\Brand');
    }

    public function cart (){
        return $this->belongsTo('App\Cart','product_id','id');
    }
     public function wishlist (){
        return $this->belongsTo('App\Wishlist','product_id','id');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function review(){
        return $this->morphMany('App\Review','commentable');
    }
}
