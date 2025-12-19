<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_reviews extends Model
{
    use HasFactory;

    // Tên bảng trong DB
    protected $table = 'product_reviews';

    // Các cột được phép insert / update
    protected $fillable = [
        'product_id',     // Thuộc sản phẩm
        'user_id',        // ID user
        'rating',         // Số sao
        'content',        // Nội dung đánh giá
        'reviewer_name',  // Tên người đánh giá
    ];
}
