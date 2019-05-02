<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
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
            'room' => 'required',
            'shelf' => 'required|unique:storage',
        ];
    }

    public function messages()
    {
        return [
            'room.required' => 'Name is Required',
            'shelf.required' => 'Code is Required',
        ];
    }
}
