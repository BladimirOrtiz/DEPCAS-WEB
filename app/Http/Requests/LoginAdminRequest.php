<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'user_name' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'El campo User Name es obligatorio.',
            'password.required' => 'El campo Password es obligatorio.',
        ];
    }

}
