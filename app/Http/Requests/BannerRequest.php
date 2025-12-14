<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' =>['required', 'min:3', 'max:30'],
            'link' =>['nullable', 'url'],
            'is_active'=>['nullable', 'boolean'],
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'subtitle'=>'nullable|string',
            'sort_order'=>'nullable|numeric'
        ];
    }
    public function attributes()
    {
        return [
            'title'=>'Tiêu đề',
            'sort_order'=>'Thứ tự hiển thị',
            'link' =>'Đường dẫn',
            'is_active'=>"Trạng thái ẩn/hiển",
            'image'=>'Ảnh banner',
            'subtitle'=>'Nội dung phụ'
        ];
    }
}