<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Reader_favoritesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],

            'slug' => ['nullable', 'string', 'max:255'],

            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'rating' => ['nullable', 'numeric', 'min:0'],

            'excerpt' => ['nullable', 'numeric', 'min:0'],

            'is_active' => ['nullable', 'boolean'],

            'sort_order' => ['required', 'in:draft,published'],
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề món / bài viết',
            'slug' => 'Dùng cho URL GET RECIPE',
            'thumbnail' => 'Ảnh',
            'rating' => 'Số sao (0 → 5)',
            'excerpt' => 'Mô tả ngắn',
            'is_active' => 'Bật / tắt hiển thị ngoài home',
            'sort_order' => 'Sắp xếp hiển thị'
        ];
    }
}
