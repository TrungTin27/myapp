<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Author_sectionsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            // Tiêu đề (hello!)
            'title' => ['required', 'string', 'min:3', 'max:255'],

            // Mô tả giới thiệu
            'description' => ['nullable', 'string'],

            // Ảnh tác giả / ảnh section
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // Text của nút (Learn more)
            'button_text' => ['nullable', 'string', 'max:100'],

            // Link của nút (/about)
            'button_link' => ['nullable', 'string', 'max:255'],

            // Bật / tắt hiển thị
            'is_active' => ['nullable', 'boolean'],

            // Thứ tự hiển thị
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'description' => 'Nội dung giới thiệu',
            'image' => 'Hình ảnh',
            'button_text' => 'Chữ nút (Learn more)',
            'button_link' => 'Link nút',
            'is_active' => 'Trạng thái hiển thị',
            'sort_order' => 'Thứ tự sắp xếp',
        ];
    }
}
