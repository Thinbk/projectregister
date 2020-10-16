<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username'   => 'required',
            'password'   => 'required',
            'full_name'   => 'required',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'full_name.required' => 'Không được để trống',
            'date_of_birth.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'phone_number.required' => 'Không được để trống',
        ];
    }
}
