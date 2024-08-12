<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;


class ConfirmPasswordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|password',
        ]);

        // Nếu xác nhận mật khẩu thành công
        if (Auth::attempt(['email' => $request->user()->email, 'password' => $request->password])) {
            // Đặt thông báo thành công trong session
            return redirect()->route('some.route')->with('status', 'Cập nhật mật khẩu thành công.');
        }

        return back()->withErrors(['password' => 'Mật khẩu không chính xác']);
    }
}