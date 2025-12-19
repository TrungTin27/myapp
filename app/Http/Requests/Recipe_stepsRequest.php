<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Recipe_stepsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        return [
            // Sản phẩm / công thức liên kết
            'product_id' => ['required', 'integer', 'exists:products,id'],

            // Đường dẫn liên quan (nếu có)
            'products' => ['nullable', 'url'],

            // Số thứ tự bước
            'step_number' => ['required', 'integer', 'min:1'],

            // Nội dung hướng dẫn
            'instruction' => ['required', 'string'],

            // Ảnh minh hoạ cho bước
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id'  => 'Công thức',
            'products'    => 'Đường dẫn',
            'step_number' => 'Số bước',
            'instruction' => 'Hướng dẫn thực hiện',
            'image'       => 'Ảnh minh hoạ',
        ];
    }
}
