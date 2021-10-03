<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageRequest extends FormRequest
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
            'age'=>'numeric',
            'image'=>'mimes:jpg,jpeg,png,svg'
            
        ];
    }
    public function messages()
    {
        return [
            'age.numeric' => 'Yaş yerinə rəqəm yazılmalıdır',
            'image.mimes' => 'Şəkil yalnız png,jpeg,jpg,svg formatında ola bilər',
        ];
    }
}
