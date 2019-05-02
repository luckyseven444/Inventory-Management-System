<?php

namespace App\Http\Requests;

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
            'name' => 'required',
            // 'code' => 'required|unique:storage',
            'vendor' => 'required',
            'room' => 'required',
            'shelf' => 'required|unique:storage',
            'expiry_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'code.required' => 'Code is Required',
            'vendor.required' => 'Vendor is Required',
            'room.required' => 'Room is Required',
            'shelf.required' => 'Shelf is Required',
            'expiry_date.required' => 'Expiry date is Required',
        ];
    }

}
