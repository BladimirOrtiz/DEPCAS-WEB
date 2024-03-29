<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
                        'user_name'=> 'required|:admin_users,name',
                        'email'=> 'required|unique:admin_users,email',
                        'password'=> 'required|min:8',
                        'password' => 'sometimes|min:8'
        ];
    }
}
