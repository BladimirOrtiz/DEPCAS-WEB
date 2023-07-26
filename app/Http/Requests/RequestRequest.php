<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
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
            'requestfolio' => 'required',
            'request_type' => 'required',
            'sector_destined' => 'required',
            'institution_name' => 'required',
            'request_description' => 'required',
            'applicant_files' => 'required',
            'created_date' => 'required',
            'creation_time' => 'required'
        ];
    }
}
