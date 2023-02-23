<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
     * Get the validation rules that apply to thսe request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'work_title_am', 'work_title_en', 'work_subject_am', 'work_subject_en', 'work_content_am', 'work_content_en'  => ['min:3', 'max:30000'],
			'document_am', 'document_en' => ['file', 'mimes:pdf,doc']
        ];
    }
}
