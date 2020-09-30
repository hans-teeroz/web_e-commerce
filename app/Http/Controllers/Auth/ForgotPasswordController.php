<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestResetPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getForgotPassword()
    {
        return view('auth.passwords.email');
    }

    public function sendCoderesetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where('email',$email)->first();
        if (!$checkUser){
            return redirect()->back()->with('danger','Email không tồn tại');
        }
        $code = bcrypt(bin2hex(md5(time().$email)));
        //dd($code);
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now('Asia/Ho_Chi_Minh');
        $checkUser->save();

        //link gửi trong mail
        $urlReset = route('get.reset.password',['code' => $checkUser->code, 'email' =>$email]);
        $data =[
            'route' => $urlReset
        ];
        Mail::send('email.reset_password', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Khôi phục mật khẩu');
        });
        return redirect()->back()->with('success','Vui lòng check mail của bạn');

    }

    public function getresetPassword(Request $request)
    {
        $code  = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code' => $code,
            'email'=> $email
        ])->first();
        if (!$checkUser)
        {
            return redirect('/')->with('danger','Đường dẫn không hợp lệ. Xin vui lòng kiểm tra lại!!');
        }
        return view('auth.passwords.reset',compact('checkUser'));
    }
    
    public function resetPassword(RequestResetPassword $requestResetPassword)
    {
       if ($requestResetPassword->password)
       {
           $checkUser = User::where([
               'code' => $requestResetPassword->code,
               'email'=> $requestResetPassword->email
           ])->first();
           if (!$checkUser)
           {
               return redirect('/')->with('danger','Đường dẫn không hợp lệ. Xin vui lòng kiểm tra lại!!');
           }
           $checkUser->password = bcrypt($requestResetPassword->password);
           $checkUser->save();
           return redirect()->route('get.login')->with('success','Mật khẩu đã được thay đổi...Xin mời đăng nhập lại!!!');
       }
    }
}
