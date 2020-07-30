<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStorePartnersipRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'company_name' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required|in:active,disable,not_verified',
        ];
    }
}
