<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Recipe_videosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_id' => ['required', 'min:3', 'max:30'],
            'products' => ['nullable', 'url'],
            'title' => ['nullable', 'boolean'],
            'video_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'thumbnail' => 'nullable|string',
            'duration' => 'nullable|numeric'
        ];
    }
    public function attributes()
    {
        return [
            'product_id' => 'Tiêu đề',
            'products' => 'Thứ tự hiển thị',
            'title' => 'Đường dẫn',
            'video_url' => "Trạng thái ẩn/hiển",
            'thumbnail' => 'Ảnh banner',
            'duration' => 'Nội dung phụ'
        ];
    }
}
