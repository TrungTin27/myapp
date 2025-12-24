<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class under_recipes extends Model
{
    use HasFactory;

    protected $table = 'under_recipes';
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
