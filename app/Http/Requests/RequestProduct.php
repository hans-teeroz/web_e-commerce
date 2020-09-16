<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required|unique:products,pro_name,'.$this->id,
            'pro_category_id' => 'required',
            //'pro_avatar' => 'required',
            'pro_description' => 'required',
            'pro_price' => 'required',
            'pro_content' => 'required',
            'pro_sale' => 'required',
            'pro_number' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pro_name.required' => 'Tên sản phẩm không được để trống!',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại!',
            'pro_avatar.required' => 'Ảnh sản phẩm không được để trống!',
            'pro_price.required' => 'Giá sản phẩm không được để trống!',
            'pro_description.required' => 'Mô tả sản phẩm không được để trống!',
            'pro_category_id.required' => 'Loại sản phẩm không được để trống!',
            'pro_content.required' => 'Nội dung sản phẩm không được để trống!',
            'pro_sale.required' => 'Phần trăm khuyến mãi sản phẩm không được để trống!',
            'pro_number.required' => 'Số lượng sản phẩm không được để trống!',
        ];
    }
}
