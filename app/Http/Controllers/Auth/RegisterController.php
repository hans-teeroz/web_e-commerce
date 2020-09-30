<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestRegister;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Mail;

class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    public function getRegister()
    {
        return view('auth.register');
    }



    public function postRegister(RequestRegister $requestRegister)
    {
        //dd($request->all());
        $user = new User();
        $user->name = $requestRegister->name;
        $user->email = $requestRegister->email;
        $user->phone = $requestRegister->phone;
        $user->password = bcrypt($requestRegister->password);
        $user->save();

        if($user->id){
            $email = $user->email;
            $code = bcrypt(bin2hex(md5(time().$email)));

            //link gửi trong mail
            $url = route('get.verifyaccount.register',['id' => $user->id,'code' =>  $code]);
            $data =[
                'route' => $url
            ];
            Mail::send('email.verify_account', $data, function($message) use ($email){
                $message->to($email, 'Verify Account')->subject('Xác thực tài khoản');
            });
            $user->code_active = $code;
            $user->time_code_active = Carbon::now('Asia/Ho_Chi_Minh');
            $user->save();
            return redirect()->route('get.login')->with('warning','Xin vui lòng xác thực tài khoản để hoàn tất thủ tục!!');
        }
        return redirect()->back();
    }
    public function verifyAccount(Request $request)
    {
        $code  = $request->code;
        $id = $request->id;
        $checkUser = User::where([
            'code_active' => $code,
            'id'=> $id
        ])->first();
        if (!$checkUser)
        {
            return redirect('/')->with('danger','Đường dẫn không hợp lệ. Xin vui lòng kiểm tra lại!!');
        }
        $checkUser->active = 0;
        $checkUser->save();
        return redirect()->route('home')->with('success','Tài khoản đã được kích hoạt...Xin chúc mừng!!!');
    }

}
