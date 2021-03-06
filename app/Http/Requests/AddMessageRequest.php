<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'message.required'=>'boş mesaj yollamaq olmaz',
            'message.max'=>'mesajınız max 255 xarakterdən ibarət ola bilər'
        ];
    }
}
