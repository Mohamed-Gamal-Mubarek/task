<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
            'name'      => 'required|string|min:3|max:30',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password',
            'user_name' => 'required|unique:users,user_name',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
