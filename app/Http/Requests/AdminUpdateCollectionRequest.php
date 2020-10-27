<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateCollectionRequest extends FormRequest
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
            'name' => 'string',
            'image' => 'mimes:jpeg,png,jpg',
            'gender_id' => 'exists:genders,id',
            'is_to_homepage' => 'boolean',
            'active' => 'boolean'
//            'product_id' => 'exists:products,id',
        ];
    }
}
