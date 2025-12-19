<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Recipe_steps extends Model
{
    use HasFactory;

    protected $table = 'Recipe_steps';
    protected $fillable = [
        'product_id',
        'products',
        'step_number',
        'instruction',
        'image',
    ];
}
