<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Contact_messages extends Model
{
    
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'name',
        'email'
    ];

}
