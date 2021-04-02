<?php

namespace App\Http\Requests\v2;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreDestination extends FormRequest
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
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location_image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
