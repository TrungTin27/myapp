<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Breakfast_recipesRequest extends FormRequest
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

            'recipe_price' => ['nullable', 'numeric', 'min:0'],

            'serving_price' => ['nullable', 'numeric', 'min:0'],

            'is_featured' => ['nullable', 'boolean'],

            'status' => ['required', 'in:draft,published'],
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tên món',
            'slug' => 'URL',
            'thumbnail' => 'Ảnh',
            'recipe_price' => "Giá công thức",
            'serving_price' => 'Giá phục vụ serving',
            'is_featured' => 'Món nổi bật',
            'status' => 'published / draft'
        ];
    }
}
