<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Recipe_sectionsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        return [
            // Sản phẩm liên kết
            'product_id' => ['required', 'integer', 'exists:products,id'],

            // Đường dẫn (link)
            'products' => ['nullable', 'url'],

            // Tiêu đề
            'title' => ['required', 'string', 'max:255'],

            // Nội dung
            'content' => ['nullable', 'string'],

            // Thứ tự hiển thị
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id' => 'Sản phẩm',
            'products'   => 'Đường dẫn',
            'title'      => 'Tiêu đề',
            'content'    => 'Nội dung',
            'sort_order' => 'Thứ tự hiển thị',
        ];
    }
}
