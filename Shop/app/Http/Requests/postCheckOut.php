<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postCheckOut extends FormRequest
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
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
        ];
    }
}
