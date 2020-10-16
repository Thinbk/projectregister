<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateTopicRequest extends FormRequest
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
            'name' => 'required',
            'topic_code' => 'required',
            'lecturer_id' => 'required',
            'date'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'topic_code.required' => 'Không được để trống',
            'lecturer_id.required' => 'Không được để trống',
            'date.required' => 'Không được để trống',
        ];
    }
}
