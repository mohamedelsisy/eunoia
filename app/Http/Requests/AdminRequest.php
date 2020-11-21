<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:191',
            'email'         => 'required|email|max:191',
            'password'      => 'required_without:id|max:191',
            'photo'         => 'required_without:id|mimes:jpg,png,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'هذا الحقل مطلوب' ,
            'required_without'      => 'هذا الحقل مطلوب' ,
            'email'                 => 'برجاء إدخال بريد إلكتروني صالح',
            'max'                   => 'لقد تجاوزت الحد الأقصي للحدود  ' ,
            'mimes'                 => 'هذه الصيغة غير صحيحة' ,
        ];
    }
}
