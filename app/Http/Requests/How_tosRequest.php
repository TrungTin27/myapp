<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class How_tosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            // Tiêu đề how-to
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            // Slug dùng cho URL
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('how_tos', 'slug')->ignore($this->id),
            ],

            // Ảnh thumbnail (ảnh tròn)
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Trạng thái hiển thị
            'is_active' => [
                'required',
                'boolean',
            ],

            // Thứ tự hiển thị
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề How-to',
            'slug' => 'Đường dẫn (slug)',
            'thumbnail' => 'Hình ảnh',
            'is_active' => 'Trạng thái hiển thị',
            'sort_order' => 'Thứ tự hiển thị',
        ];
    }
}
