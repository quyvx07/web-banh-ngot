<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreate extends FormRequest
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
            'name' => 'required',
            'id_type' => 'required|regex:/[0-9]/',
            'unit_price' => 'required|regex:/[0-9]/',
            'promotion_price' => 'required|regex:/[0-9]/',
            'description' => 'required',
            'unit' => 'required',
            'new' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp,gif,svg,jpg',
        ];
    }
}
