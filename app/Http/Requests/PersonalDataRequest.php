<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDataRequest extends FormRequest
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



    public function rules()
    {
        return [
            'personalname' => 'required',
            'paternallastname' => 'required',
            'maternalastname' => 'required',
            'birthdate' => 'required',
            'curp' => 'required',
            'gender' => 'required',
            'cellphonenumber' => 'required',
            'homenumber' => 'nullable',
        ];
    }
}
