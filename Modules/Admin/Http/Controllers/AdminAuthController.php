<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.home')->with('success','Đăng nhập thành công');;
        }
        return redirect()->back()->with('danger','Kiểm tra lại thông tin đăng nhập');
    }
    public function getLogoutAdmin()
    {

        \Auth::guard('admins')->logout();
        return redirect()->route('admin.login')->with('success','Đăng xuất thành công');
    }
}
