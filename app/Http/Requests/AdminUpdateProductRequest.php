<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateProductRequest extends FormRequest
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
            'gender_id' => 'exists:genders,id',
            'product_category_id' => 'exists:product_categories,id',
            'sizing_id' => 'exists:sizings,id',
            'color_id' => 'exists:colors,id',
            'status' => 'in:active,disable',
            'price' => 'numeric',
        ];
    }
}
