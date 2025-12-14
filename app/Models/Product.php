<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'price',
        'cook_time',
        'short_description',
        'description',
        'rating',
        'rating_count',
        'views',
        'is_featured',
    ];
}
