<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Product_detailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_id' => 'nullable|string ',
            'products' =>  'nullable|string',
            'content' => 'nullable|string',
            'nutrition' => 'nullable|string',
            'tips' => 'nullable|string',

        ];
    }
    public function attributes()
    {
        return [
            'product_id' => 'id sản phẩm',
            'products' => 'sản phẩm',
            'content' => 'nội dung chi tiết',
            'nutrition' => "thông tin dinh dưỡng",
            'tips' => 'ghi chú và mẹo',
        ];
    }
}
