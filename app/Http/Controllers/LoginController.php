<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('use.login.index');
    }

    public function LogOut()
    {
        try {
            Auth::logout();
            return redirect()->route('index-login')->with('message', 'Đăng Xuất Thành Công !');
        } catch (\Exception $e) {
            return redirect()->route('index-login')->with('error', 'Có lỗi xảy ra trong quá trình đăng xuất!');
        }
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Kiểm tra quyền của user sau khi đăng nhập
            if (Auth::user()->id_role == 1) {
                return redirect()->route('index-dashboard'); 
            }
            return redirect('/');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(['email' => 'Tài khoản hoặc mật khẩu không chính xác']);
    }

}
