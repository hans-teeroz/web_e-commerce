<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransaction extends FormRequest
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
            'payment' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'payment.required' => 'Vui lòng chọn phương thức thanh toán!',
            'address.required' => 'Địa chỉ không được để trống!',
            'phone_number.required' => 'Số điện thoại không được để trống!',

        ];
    }
}
