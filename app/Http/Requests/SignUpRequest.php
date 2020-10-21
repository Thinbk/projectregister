<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            //
            'username'   => 'required|unique:users',
            'password'   => 'required|min:5|max:255',
            'email' => 'unique:users|email|required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Không được để trống',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu có độ dài lớn hơn 3',
            'password.max' => 'Mật khẩu có độ dài nhỏ hơn 255',
            'email.required' => 'Không được để trống',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
