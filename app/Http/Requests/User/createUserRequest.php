<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            'name'        =>  'required|string|min:3|max:255',
            'tel'         =>  'required',
            'fonction'    =>  'required',
            'service_id'  =>  'required',
            'role_id'     =>  'required',
            'email'       =>  'required|email|unique:users',
            'password'    =>  'required|min:8|confirmed',
        ];
    }
}
