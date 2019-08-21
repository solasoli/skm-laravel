<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Handling in \App\Policies\UserPolicy
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('lg.nameisrequired'),
            'email.required' => __('lg.emailisrequired'),
            'email.email' => __('lg.invalidemail', ['email' => $this->email]),
            'email.unique' => __('lg.emailexists', ['email' => $this->email]),
            'password.required' => __('lg.passwordrequired'),
            'password.min' => __('lg.passwordshort', ['length' => 5]),
            'password.confirmed' => __('lg.passwordconfirmation'),
            'password_confirmation.required' => __('lg.confirmpassrequired')
        ];
    }
}
