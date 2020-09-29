<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ];
    }

    /**
     * 
     * @return array message error
     */
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập username',
            'username.min' => 'Vui lòng nhập usename từ 6 ký tự',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập password từ 6 ký tự',
        ];
    }
}
