<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Phải nhập email chứ',
            'email.email' => 'Địa chỉ email không hợp lệ', // Thêm thông báo lỗi cho định dạng email sai
            'username.required' => 'Tên đăng nhập phải lên 8 kí tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.min' => 'Tên đăng nhập phải lên 8 kí tự',
            'username.max' => 'Tên đăng nhập tối thiểu là 20 kí tự',
            'address.nullable' => 'Địa chỉ không thể để trống.', // Thông báo khi address không có giá trị và không yêu cầu
            'address.string' => 'Địa chỉ phải là một chuỗi văn bản.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
    }
}
