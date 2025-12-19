<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Product_reviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {   
    return [
        'product_id' => ['required', 'integer', 'exists:products,id'],
        'products' => ['nullable', 'url'],
        'user_id' => ['nullable', 'integer', 'exists:users,id'],
        'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
        'comment' => ['nullable', 'string', 'max:1000'],
        'author_name' => ['nullable', 'string', 'max:255'],
    ];
    }

    public function attributes()
    {
    return [
        'product_id'  => 'Sản phẩm',
        'products'    => 'Liên kết sản phẩm',
        'user_id'     => 'Người dùng',
        'rating'      => 'Điểm đánh giá',
        'comment'     => 'Nội dung đánh giá',
        'author_name' => 'Tên người đánh giá',
    ];
    }
}
