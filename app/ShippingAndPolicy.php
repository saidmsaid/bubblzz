<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAndPolicy extends Model
{
    protected $table = 'shipping_and_policies';
    protected $primaryKey ="shipping_and_policies_id";
    protected $fillable = ['shipping_title','shipping_text','policies_title','policies_text'];
}
