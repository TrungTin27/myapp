<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Recipe_ingredientsRequest extends FormRequest
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

            // Đường dẫn (link banner / link sản phẩm)
            'products' => ['nullable', 'url'],

            // Tiêu đề
            'name' => ['required', 'string', 'max:255'],

            // Trạng thái hiển thị (0 = ẩn, 1 = hiện)
            'amount' => ['nullable', 'boolean'],

            // Thứ tự hiển thị
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id' => 'Sản phẩm',
            'products'   => 'Đường dẫn',
            'name'       => 'Tiêu đề',
            'amount'     => 'Trạng thái hiển thị',
            'order'      => 'Thứ tự hiển thị',
        ];
    }
}
