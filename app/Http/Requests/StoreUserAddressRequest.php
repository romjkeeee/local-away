<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
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
            'address' => 'required|string',
            'street_no' => 'required|string',
            'zip_code' => 'required|string',
            'city' => 'required|string',
            'state' => 'nullable|string',
            'country' => 'required|string',
            'apartment' => 'nullable|string',
            'phone' => 'required|string',
            'default' => 'boolean'
        ];
    }
}
