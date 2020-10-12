<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateTravelStoryReqeust extends FormRequest
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
            'annotation' => 'string|max:80',
            'description' => 'string',
            'preview_image' => 'image|mimes:jpeg,png,jpg',
            'full_image_path' => 'image|mimes:jpeg,png,jpg',
            'is_to_homepage' => 'boolean',
            'active' => 'boolean',
            'product_ids' => 'nullable|exists:products,id',
        ];
    }
}
