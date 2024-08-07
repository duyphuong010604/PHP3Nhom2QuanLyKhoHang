<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'username' => ['required','unique:users', 'string'],
            'email' => [
                'required', 
                'string', 
                'lowercase', 
                'email', 
                'max:255', 
                'unique:' . User::class,
                function ($attribute, $value, $fail) {
                    if (!str_contains($value, '@')) {
                        $fail('Địa chỉ email phải chứa ký tự "@".');
                    }
                    if (!(str_ends_with($value, '.com') || str_ends_with($value, '.vn'))) {
                        $fail('Địa chỉ email phải kết thúc bằng ".com" hoặc ".vn".');
                    }
                }
            ],
            'password' => ['required', 'string', 'min:8'], // Đảm bảo mật khẩu có ít nhất 8 ký tự
            'fullname' => ['required', 'string', 'max:255'],
        ];

    }
    //Bắt lỗi form 
    public function messages() {
        return [
            'email.required' => 'Phải nhập email chứ',
            'email.string' => 'Email phải là một chuỗi ký tự.',
            'email.lowercase' => 'Email phải được viết thường.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.max' => 'Địa chỉ email không được vượt quá 255 ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.required' => 'Password là bắt buộc.',
            'password.min' => 'Password phải có ít nhất 8 ký tự.', // Thông báo lỗi cho độ dài mật khẩu
            'fullname.required' => 'Phải Nhập Họ Và Tên',
            'username.required' => 'Tên đăng nhập phải lên 8 kí tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.min' => 'Tên đăng nhập phải lên 8 kí tự',
            'username.max' => 'Tên đăng nhập tối thiểu là 20 kí tự',
       ];
     }
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
