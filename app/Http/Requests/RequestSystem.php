<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSystem extends FormRequest
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
            'sys_name' => 'required:systems,sys_name,'.$this->id,
            'sys_info' => 'required',
            //'pro_avatar' => 'required',
            'sys_address' => 'required',
            'sys_title' => 'required',
            'sys_email' => 'required',
            'sys_phone' => 'required',
            'sys_open_hour' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'sys_name.required' => 'Tên Website không được để trống!',
//            'pro_name.unique' => 'Tên sản phẩm đã tồn tại!',
//            'pro_avatar.required' => 'Ảnh sản phẩm không được để trống!',
            'sys_info.required' => 'Thông tin Website không được để trống!',
            'sys_address.required' => 'Địa chỉ không được để trống!',
            'sys_title.required' => 'Tiêu đề Website không được để trống!',
            //'sys_email.required' => 'Nội dung sản phẩm không được để trống!',
            'sys_phone.required' => 'SĐT không được để trống!',
            'sys_open_hour.required' => 'Giờ mở cửa không được để trống!',
        ];
    }
}
