<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' =>'required',
            'password' => 'required',
            'fullname' =>'required',
            'gioitinh' =>'required',
            'ngaysinh' =>'required',
            'avatar'   =>'required',
            'noisong'  =>'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'fullname.required' => 'Vui lòng nhập họ tên',
            'gioitinh.required' => 'Vui lòng chọn giới tính',
            'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
            'avatar.required' => 'Vui lòng chọn hình ảnh',
            'noisong.required' => 'Vui lòng nhập nơi sống',
        ];
    }
}
