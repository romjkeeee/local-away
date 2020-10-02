<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFounderRequest extends FormRequest
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
            'linkedin' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
            'photo' => 'image|mimes:jpeg,png,jpg',
            'status' => 'in:active,disable',
        ];
    }
}
