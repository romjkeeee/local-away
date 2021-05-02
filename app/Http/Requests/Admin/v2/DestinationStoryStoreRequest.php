<?php

namespace App\Http\Requests\Admin\v2;

use Illuminate\Foundation\Http\FormRequest;

class DestinationStoryStoreRequest extends FormRequest
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
            'destination_id'    => 'required|integer|exists:destinations,id',
            'name'              => 'required|string',
            'description'       => 'required|string',
            'image'             => 'required|image|dimensions:max_width=544,max_height=240',
        ];
    }
}
