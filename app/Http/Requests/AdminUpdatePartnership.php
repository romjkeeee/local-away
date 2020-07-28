<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdatePartnership extends FormRequest
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
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'string|email',
            'company_name' => 'string',
            'country' => 'string',
            'phone' => 'string',
            'status' => 'boolean',
        ];
    }
}
