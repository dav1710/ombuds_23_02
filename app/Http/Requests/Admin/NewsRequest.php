<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'tabs' => 'required',
    		'title_am', 'title_en' => ['max:250'],
			'content_am', 'content_en' => ['max:10000'],
			'file_am.*', 'file_en.*' => ['image', 'max:20000']
        ];
    }
}
