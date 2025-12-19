<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Recipe_videos extends Model
{
    use HasFactory;

    protected $table = 'Recipe_videos';
    protected $fillable = [
        'product_id',
        'title',
        'video_url',
        'thumbnail',
        'duration',
    ];
}
