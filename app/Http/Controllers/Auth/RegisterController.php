<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestRegister;
use App\User;
use App\Http\Controllers\Controller;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
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
            return redirect()->route('get.login');
        }
        return redirect()->back();
    }

}
