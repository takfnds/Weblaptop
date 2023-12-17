<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendMenuRequest extends FormRequest
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
            'mn_name' => 'required|unique:menus,mn_name,' . $this->id
        ];
    }

    public function messages()
    {
        return [
            'mn_name.required' => 'Dữ liệu không được để trống',
            'mn_name.unique'   => 'Dữ liệu đã tồn tại',
        ];
    }
}
