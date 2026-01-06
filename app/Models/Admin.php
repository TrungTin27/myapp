<?php

namespace App\Models;

// Quan trọng: Phải dùng lớp Authenticatable này
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Các cột có thể thêm vào (fillable)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Ẩn mật khẩu khi xuất dữ liệu
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
