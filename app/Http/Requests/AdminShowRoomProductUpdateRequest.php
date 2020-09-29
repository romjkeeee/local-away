<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminShowRoomProductUpdateRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png,jpg',
            'collection_id' => 'exists:collections,id',
            'active' => 'boolean'
        ];
    }
}
