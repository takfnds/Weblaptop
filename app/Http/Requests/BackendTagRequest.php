<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendTagRequest extends FormRequest
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
            't_name' => 'required|unique:tags,t_name,' . $this->id
        ];
    }

    public function messages()
    {
        return [
            't_name.required' => 'Dữ liệu không được để trống',
            't_name.unique'   => 'Dữ liệu đã tồn tại',
        ];
    }
}
