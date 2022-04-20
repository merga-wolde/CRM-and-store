<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
         'firstname','lastname', 'email','address','phone', 'country','city','zip','pay_method','product_name','quantity','total_money', 
    ];
}
