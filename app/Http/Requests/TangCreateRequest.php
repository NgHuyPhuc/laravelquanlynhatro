<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TangCreateRequest extends FormRequest
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
            'ten_tang' => 'required|string|max:255', // tên nhà trọ là bắt buộc, phải là chuỗi, không dài quá 255 ký tự, và duy nhất trong bảng nhatros
            'ten_tang_so' => 'required|numeric|unique:tangs',
        ];
    }
}
