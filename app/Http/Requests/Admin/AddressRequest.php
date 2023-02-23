<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
    		'region_am', 'region_ru', 'work_time_am', 'work_time_en', 'address_am', 'address_en', 'mail', 'phone' => ['required'],
			'phone' => ['numeric']
        ];
    }
}
