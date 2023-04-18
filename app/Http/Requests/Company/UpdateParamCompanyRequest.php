<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParamCompanyRequest extends FormRequest
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
            'email'      => 'nullable',
            'tel'        => 'required',
            'tel_mobile' => 'nullable',
            'fax'        => 'nullable',

        ];
    }
}
