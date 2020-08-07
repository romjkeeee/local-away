<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreStyleStoryRequest extends FormRequest
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
            'travel_stories_id' => 'required|exists:travel_stories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'gender_id' => 'required|exists:genders,id',
        ];
    }
}
