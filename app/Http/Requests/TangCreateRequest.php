<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'ten_tang_so' => [
                'required',
                'numeric',
                Rule::unique('tangs')->where('id_nha_tro', $this->id_nha_tro),
            ],
        ];
    }
}
