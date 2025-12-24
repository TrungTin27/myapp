<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class chicken_recipes extends Model
{
    use HasFactory;

    protected $table = 'chicken_recipes';
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'recipe_price',
        'serving_price',
        'is_featured',
        'status',
    ];
}
