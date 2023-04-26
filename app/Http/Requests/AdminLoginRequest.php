<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Rules\CheckPassword;

class AdminLoginRequest extends FormRequest
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
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                Rule::exists('users')
                    ->where('email',$this->request->get('email')),
                'max:255',
            ],
            'password' => [
                'required',
                new CheckPassword($this->request->get('email')),
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'The email address is not registered.'
        ];
    }
}
