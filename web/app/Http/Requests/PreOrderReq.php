<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreOrderReq extends FormRequest
{

    public function rules()
    {
        return [
            'f_tel' => 'required|min:9|numeric',
        ];
    }

    public function messages()
    {
        return [
            'f_tel.required' => 'Bạn hãy nhập Số ĐT nhé'
        ];
    }

}

?>