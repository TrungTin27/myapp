<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class how_tos extends Model
{
    use HasFactory;

    protected $table = 'how_tos';
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'is_active',
        'sort_order',
    ];
}
