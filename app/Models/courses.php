<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'price',
        'level',
        'duration',
    ];

    /**
     * Auto-generate slug if empty
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title) . '-' . time();
            }
        });

        static::updating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title) . '-' . time();
            }
        });
    }

    /**
     * Casts
     */
    protected $casts = [
        'price' => 'integer',
    ];
}
