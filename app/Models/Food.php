<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $attributes = ['status' => 'published'];

    protected $fillable = [
        'code',
        'status',
        'url',
        'creator',
        'product_name',
        'quantity',
        'brands',
        'categories',
        'labels',
        'cities',
        'purchase_places',
        'stores',
        'ingredients_text',
        'traces',
        'serving_size',
        'serving_quantity',
        'nutriscore_score',
        'nutriscore_grade',
        'main_category',
        'image_url',
    ];
}
