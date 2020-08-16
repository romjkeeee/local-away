<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateSizingGuide extends FormRequest
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
            'sizing_category_id' => 'exists:sizing_categories,id',
            'title' => 'string',
            'text' => '',
            'image' => 'image',
            'gender' => 'exists:genders,id',
            'active' => '',
        ];
    }
}
