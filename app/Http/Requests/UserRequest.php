<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => $this->route('user') ? '' : 'required|email',
            'password' => $this->route('user') ? '' : 'required|min:6',
            'enabled' => ''
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'The new user needs a name.',
            'email.required' => 'The new user needs an email.',
            'password.required' => 'The new user needs a password.'
        ];
    }
}
