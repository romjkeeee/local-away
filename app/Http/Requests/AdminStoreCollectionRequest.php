<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreCollectionRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,png,jpg',
            'gender_id' => 'required|exists:genders,id',
            'pack_for' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'is_to_homepage' => 'boolean',
            'active' => 'boolean'
//            'product_id' => 'required|exists:products,id',
        ];
    }
}
