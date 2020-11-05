<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAddress extends FormRequest
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
            'address' => 'string',
            'zip_code' => 'string',
            'city' => 'string',
            'state' => 'nullable|string',
            'country' => 'string',
            'apartment' => 'nullable|string',
            'phone' => 'nullable|string',
            'default' => 'boolean'
        ];
    }
}
