<?php

namespace App\Http\Requests\v2;

use Illuminate\Foundation\Http\FormRequest;

class JoinClubRequest extends FormRequest
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
            'form'  => 'nullable|integer',
            'name'  => 'required|string',
            'email'  => 'required|email',
            'phone'  => 'required|numeric',
            'country'  => 'required|string',
            'zip_code'  => 'required|regex:/^[0-9]{5}(?:-[0-9]{4})?$/',
        ];
    }
}
