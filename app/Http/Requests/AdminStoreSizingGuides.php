<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreSizingGuides extends FormRequest
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
            'sizing_category_id' => 'required|exists:sizing_categories,id',
            'title' => 'required|string',
            'text' => 'required',
            'image' => 'required|image',
            'gender' => 'required|in:male,female',
        ];
    }
}
