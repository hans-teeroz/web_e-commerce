<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Order;
use App\Models\Transaction;
use App\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends FrontendController
{
    public function index(Request $request)
    {
        $transactions = Transaction::where('tr_user_id',get_data_user('web'))->orderByDesc('id')->paginate(10);
        $transactionTotal = Transaction::where('tr_user_id',get_data_user('web'))->select('id')->count();
        $transactionDone = Transaction::where('tr_user_id',get_data_user('web'))->where('tr_status' ,Transaction::STATUS_PUBLIC)->select('id')->count();
        SEOTools::setTitle('Đơn hàng');
        SEOTools::setDescription('Xem chi tiết đơn hàng của bạn');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        $viewData = [
            'transactionDone'  => $transactionDone,
            'transactionTotal' => $transactionTotal,
            'transactions' => $transactions
        ];
        return view('user.transaction', $viewData);
    }

    public function updateUser(Request $request)
    {
        SEOTools::setTitle('Tài khoản');
        SEOTools::setDescription('Cập nhật thông tin của bạn');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        return view('user.index');
    }
    public function saveupdateUser(Request $request)
    {
       //dd($request->avatar);
        $userImage = new User();
        if (get_data_user('web','id')){
            $userImage = User::find(get_data_user('web','id'));
        }
        //dd($userImage->id);
       // dd($request->hasFile('avatar'));
        if($request->hasFile('avatar')){
            $file = upload_image('avatar');
            if(isset($file['name'])){
                $userImage->avatar = $file['name'];
            }
        }
        $userImage->save();
        User::where('id',get_data_user('web'))->update($request->except('_token','email_2','email','avatar'));

        return redirect()->back()->with('success','Cập nhật thông tin thành công!');
    }
    public function updatePassword(Request $request)
    {
        SEOTools::setTitle('Tài khoản');
        SEOTools::setDescription('Thay đổi mật khẩu của bạn');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        return view('user.password_user');
    }
    public function saveupdatePassword(RequestPassword $requestPassword)
    {
        //dd($requestPassword->all());
        //$hashed = Hash::make($requestPassword->password_old);
        if (Hash::check($requestPassword->password_old,get_data_user('web','password')))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->password);
            $user->save();
            return redirect()->back()->with('success','Đổi mật khẩu thành công!');
        }
        return redirect()->back()->with('danger','Mật khẩu cũ không đúng!');
    }

    public function viewOrders(Request $request,$id)
    {
        //dd($request->ajax());
        if ($request->ajax())
        {
            $orders = Order::with('getTran')->where('or_transaction_id',$id)->get();

            $html = view('components.order', compact('orders'))->render();
            //dd($html);
            return \response()->json($html);
        }

    }
}
