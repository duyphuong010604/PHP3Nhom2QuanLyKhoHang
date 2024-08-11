<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }


    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    try {
        // Xác thực email
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
        ]);

        // Gửi link đặt lại mật khẩu
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Kiểm tra trạng thái và trả về phản hồi phù hợp
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Link đặt lại mật khẩu đã được gửi đến email của bạn.');
        }

        // Nếu không phải là RESET_LINK_SENT, ném ra một ngoại lệ xác thực
        throw ValidationException::withMessages([
            'email' => ['Email bạn không có trên hệ thống vui lòng thử lại!!!.'],
        ]);

    } catch (ValidationException $e) {
        // Xử lý ngoại lệ xác thực
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Xử lý các ngoại lệ khác
        return back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
    }
}

}