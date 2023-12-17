<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendProductRequest extends FormRequest
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
            'pro_name'        => 'required|unique:products,pro_name,' . $this->id,
            'pro_price'       => 'required',
            'pro_category_id' => 'required',
            'pro_number'      => 'required',
            'pro_description' => 'required',
            'pro_content'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'        => 'Dữ liệu không được để trống',
            'pro_name.unique'          => 'Dữ liệu đã tồn tại',
            'pro_price.required'       => 'Dữ liệu không được để trống',
            'pro_number.required'      => 'Dữ liệu không được để trống',
            'pro_content.required'     => 'Dữ liệu không được để trống',
            'pro_description.required' => 'Dữ liệu không được để trống',
        ];
    }
}
