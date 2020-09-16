<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateQaRequest extends FormRequest
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
            'city_id' => 'exists:cities,id',
            'location_image' => 'image|mimes:jpeg,png,jpg',
            'lead_description' => 'string',
            'email' => 'string|email',
            'lead_image' => 'image|mimes:jpeg,png,jpg',
            'lead_lower_image' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
