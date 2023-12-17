<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email'    => 'required|unique:users,email,' . $this->id,
            'name'     => 'required',
            'password' => 'required',
            'phone'    => 'required|unique:users,phone,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Dữ liệu không được để trống',
            'phone.required'    => 'Dữ liệu không được để trống',
            'name.required'     => 'Dữ liệu không được để trống',
            'password.required' => 'Dữ liệu không được để trống',
            'email.unique'      => 'Dữ liệu đã tồn tại',
            'phone.unique'      => 'Dữ liệu đã tồn tại',
        ];
    }
}
