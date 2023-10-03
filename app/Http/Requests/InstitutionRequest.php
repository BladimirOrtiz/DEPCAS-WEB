<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionRequest extends FormRequest
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
            'institution_name' => 'required',
            'institution_type' => 'required',
            'institution_location' => 'required',
            'attention_days' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'nullable',
            'institution_email' => 'nullable',
            'institution_phonenumber' => 'nullable',
            'area_responsible' => 'required'
        ];
    }
}
