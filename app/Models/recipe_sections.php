<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Recipe_sections extends Model
{
    use HasFactory;

    protected $table = 'Recipe_sections';
    protected $fillable = [
        'product_id',
        'products',
        'title',
        'content',
        'sort_order',
    ];
}
