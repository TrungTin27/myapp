<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],

            'email' => ['required', 'string', 'max:255'],
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên món',
            'email' => 'Email',
          
        ];
    }
}
