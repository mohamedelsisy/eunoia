<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'      => 'required|string|max:120',
            'email'     => 'required|email|max:120',
            'phone'     => 'required|string|max:120',
            'subject'   => 'required|string|max:120',
            'message'   => 'required|string|max:400',

        ];
    }
    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب',
            'max'      => 'لا يمكن أن يكون القسم أكثر من 120 حرف',
        ];
    }
}
