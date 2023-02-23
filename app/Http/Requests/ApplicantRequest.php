<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:30'],
            'subject' => ['required', 'min:3', 'max:100'],
            'message' => ['required', 'min:3', 'max:5000'],
            'file' => ['required', 'file', 'max:20000'],
            'email' => ['email', 'required']
        ];
    }
}
