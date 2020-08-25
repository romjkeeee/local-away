<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreTravelStoryRequest extends FormRequest
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
            'description' => 'required|string',
            'preview_image' => 'required|image|mimes:jpeg,png,jpg',
            'full_image_path' => 'required|image|mimes:jpeg,png,jpg',
            'is_to_homepage' => 'required|boolean',
            'product_ids' => 'required|exists:products,id',
        ];
    }
}
