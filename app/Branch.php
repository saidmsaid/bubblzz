<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
    	'branch_name','branch_address','branch_number','branch_other_number'
    ];
}
