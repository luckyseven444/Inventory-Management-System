<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStockinRequest extends FormRequest
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

            'quantity' => 'required',
            'unit_price' => 'required',
            'discount' => 'required',
            'total' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'quantity.required' => 'Address is Required',
            'unit_price.required' => 'Code is Required',
            'discount.required' => 'Address is Required',
            'total.required' => 'Code is Required',
        ];
    }
}
