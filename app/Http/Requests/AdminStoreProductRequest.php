<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreProductRequest extends FormRequest
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
//            'images' => 'required',
//            'images.*' => 'image|mimes:jpeg,png,jpg',
            'gender_id' => 'required|exists:genders,id',
            'product_category_id' => 'required|exists:product_categories,id',
            'sizing_id' => 'required|exists:sizings,id',
            'color_id' => 'required|exists:colors,id',
        ];
    }
}
