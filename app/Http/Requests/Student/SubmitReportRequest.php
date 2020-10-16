<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class SubmitReportRequest extends FormRequest
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
            'file' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'file.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
        ];
    }
}
