<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

            'name'            =>  'required|string|min:3|max:255',
            'category_id'     =>  'required',
            'depot_id'        =>  'required',
            'unity_id'        =>  'required',
            'stock_min'       =>  'required|numeric',
            'quantite'        =>  'required|numeric|gt:stock_min',
            'description'     =>  'nullable',
            'vente'           =>  'nullable|numeric',
            'achat'           =>  'nullable|numeric|gt:vente',
        ];
    }
}
