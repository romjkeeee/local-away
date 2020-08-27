<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFounderRequest extends FormRequest
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
            'linkedin' => 'required|string',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
