<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required',
            'code' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'address.required' => 'Address is Required',
            'code.required' => 'Code is Required',
            'email.required' => 'Email is Required',
        ];
    }
}
