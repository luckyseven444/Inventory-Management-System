<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockinRequest extends FormRequest
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
    public function messages()
    {
        return [
            'supplier.required' => 'Supplier Name Is Required',
            // 'product.required' => 'Product Name Is Required',
            // 'quantity.required' => 'Quantity Name Is Required',
            // 'unit_price.required' => 'Unit Price Name Is Required',
            // 'discount.required' => 'Discount Name Is Required',
            // 'total.required' => 'Total Name Is Required'


        ];
    }

    public function rules()
    {
        return [
            'supplier' => 'required',
            // 'product.*' => 'required',
            // 'quantity' => 'required',
            // 'unit_price' => 'required',
            // 'discount' => 'required',
            // 'total' => 'required',
        ];
    }
}
