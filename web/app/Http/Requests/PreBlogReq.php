<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreBlogReq extends FormRequest
{

    public function rules()
    {
        return [
            'f_title' => 'required',
            'f_content' => 'required',
            'f_cat' => 'required',
            'f_thumb' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'f_title.required' => 'Nhập hết vào!!!',
            'f_content.required' => 'Nhập hết vào!!!',
            'f_cat.required' => 'Nhập hết vào!!!',
            'f_thumb.required' => 'Nhập hết vào!!!',
        ];
    }

}

?>