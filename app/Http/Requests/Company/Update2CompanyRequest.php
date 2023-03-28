<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class Update2CompanyRequest extends FormRequest
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
            'name'          => 'required|string|min:3|max:255',
            'activite'      => 'required',
            'date_creation' => 'required|date',
            'ville'         => 'required',
            'pays'          => 'required',
            'adresse'       => 'required',
        ];
    }
}
