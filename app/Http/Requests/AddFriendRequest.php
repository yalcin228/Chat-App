<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFriendRequest extends FormRequest
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
            'user_id' => 'required',
            'to_user' => 'required|unique:from_id, to_id',
            'status' => 'required',
        ];
    }
}
