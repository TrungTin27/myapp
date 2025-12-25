<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class author_sections extends Model
{
    use HasFactory;

    protected $table = 'author_sections';
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text',
        'button_link',
        'is_active',
        'sort_order',
    ];
}
