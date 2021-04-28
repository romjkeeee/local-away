<?php

namespace App\Http\Requests\Admin\v2;

use Illuminate\Foundation\Http\FormRequest;

class SubDestinationStoreRequest extends FormRequest
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
            'destination_story_id'      => 'required|integer|exists:destination_stories,id',
            'name'                      => 'required|string',
            'api_city'                  => 'required|string',
            'image'                     => 'required|image|dimensions:max_width=1264,max_height=x280',
        ];
    }
}
