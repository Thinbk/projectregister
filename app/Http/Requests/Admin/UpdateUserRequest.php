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
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Không được để trống1',
            'password.required' => 'Không được để trống2',
            'full_name.required' => 'Không được để trống3',
            'email.required' => 'Không được để trống5',
        ];
    }
}
