<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends FrontendController
{



    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials)){
            return redirect()->route('home')->with('success','Đăng nhập thành công');
        }
        return redirect('/dang-nhap')->with('danger','Kiểm tra lại thông tin đăng nhập');
    }
    public function getLogout()
    {

        \Auth::logout();
        return redirect()->route('home')->with('success','Đăng xuất thành công');
    }





}
