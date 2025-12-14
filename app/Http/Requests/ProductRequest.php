<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|max:2048',
            'price' => 'required|numeric',
            'cook_time' => 'required|numeric',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'rating' => 'required|numeric|max:5|min:1',
            'rating_count' => 'required|numeric',
            'views' => 'required|numeric',
            'is_featured' => 'required|string',
        ];
    }
    public function attributes()
    {
        return [
            'name.required' => 'Tên sán phẩm bắt buộc',
            'image.required' => 'Ảnh là bắt buộc',
            'price.required' => 'Giá sản phẩm là bắt buộc',
            'cook_time.required' => 'Thời gian là bắt buộc',
            'short_description.required' => 'Mô tả ngắn là bắt buộc',
            'description.required' => 'Mô tả là bắt buộc',
            'rating.required' => 'Đánh giá là bắt buộc',
            'rating_count.required' => 'Số lượng xếp hạng là bắt buộc',
            'views.required' => 'Lượt xem là bắt buộc',
            'is_featured.required' => 'Đặc trưng là bắt buộc',
        ];
    }
}
