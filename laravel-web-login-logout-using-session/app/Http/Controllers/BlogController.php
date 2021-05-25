<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlog(Request $request)
    {
        // ktra session login co ton tai hay k
        if ($request->session()->has('login') && $request->session()->get('login')) {


            // Session login tồn tại và có giá trị là true, chuyển hướng người dùng đến trang blog
        return view('blog');
        }
        // Session không tồn tại, người dùng chưa đăng nhập
        // Gán một thông báo vào Session not-login
        $message = 'ban chua dang nhap';
        $request->session()->flash('not-login',$message);

        // chuyen huong ve trang login
        return view('login');
    }
}
