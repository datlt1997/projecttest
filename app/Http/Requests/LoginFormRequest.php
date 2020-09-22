<?php

namespace App\Http\Requests;

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
            'email' => 'required|min:10',
            'password' => 'required|min:6',
        ];
    }
    public function messages(){
        return [
            'email.required' => 'you must enter your email',
            'email.min' => 'your email is at least 10 chacracter',
            'password.required' => 'you must enter your password',
            'password.min' => 'your password is at least 6 character',
        ];
    }
}
