<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_description', 'product_category','product_image','product_quantity', 'product_price_per_unit',
    ];
}
