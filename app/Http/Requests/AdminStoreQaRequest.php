<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreQaRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id',
            'location_image' => 'required|image|mimes:jpeg,png,jpg',
            'lead_description' => 'required|string',
            'lead_image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
