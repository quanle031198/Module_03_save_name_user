<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->inputUsername;
        $password = $request->inputPassword;

        // kiem tra thong tin dang nhap
        if($username == 'admin' && $password == '1')
        {
            //Nếu thông tin đăng nhập chính xác, Tạo một Session xác nhận đăng nhập thành công
            $request->session()->push('login',true);

            return redirect()->route('show.blog');
        }

         // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
         $message = 'Wrong user or password!';
         $request->session()->flash('login-fail', $message);

         return view('login');
    }
}
