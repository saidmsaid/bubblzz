<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name','name_ar','description','description_ar','image','parent_id','category_slug'];
    public function products () {
        return $this->hasMany('App\Product');
    }

    public function parent() {
    	return $this->belongsTo(static::class, 'parent_id');
  	}

  
  	public function children() {
    	return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc');
  	}
}
