<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hot_line', 'phone', 'facebook', 'instagram', 'twitter', 'messenger', 'mail', 'web', 'location', 'e-gov', 'e-request' => ['required'],
			'hot_line' => ['numeric']
        ];
    }
}
