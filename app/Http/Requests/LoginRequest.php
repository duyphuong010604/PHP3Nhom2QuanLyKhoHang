<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', function ($attribute, $value, $fail) {
            if (!str_contains($value, '@')) {
                $fail('Địa chỉ email phải chứa ký tự "@".');
            }
            if (!(str_ends_with($value, '.com') || str_ends_with($value, '.vn'))) {
                $fail('Địa chỉ email phải kết thúc bằng ".com" hoặc ".vn".');
            }
        }],
            'password' => ['required', 'string', 'min:8'], // Thêm điều kiện độ dài mật khẩu tối thiểu 8 ký tự
        ];

    }
    //Bắt lỗi form 
    public function messages() {
        return [
            'email.required' => 'Phải nhập email chứ',
            'email.email' => 'Địa chỉ email không hợp lệ', // Thêm thông báo lỗi cho định dạng email sai
            'password.required' => 'Password là bắt buộc',
            'password.min' => 'Password phải có ít nhất 8 ký tự', // Thông báo lỗi cho độ dài mật khẩu
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
