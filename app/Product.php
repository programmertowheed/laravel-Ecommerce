<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'short_description',
        'long_description',
        'category_id',
        'brand_id',
        'product_price',
        'product_quantity',
        'product_slug',
        'product_image',
        'publication_status',
        'offer_price',
        'admin_id'
    ];
}
