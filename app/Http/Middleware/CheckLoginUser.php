<?php


namespace App\Http\Middleware;
use Closure;

class CheckLoginUser
{
    public function handle($request, Closure $next)
    {
        if (!get_data_user('web'))
        {
            return redirect()->route('get.login')->with('danger','Bạn chưa đăng nhập!');;
        }
        if (get_data_user('web') && get_data_user('web','active') == 1)
        {
            return redirect()->back()->with('warning','Vui lòng check mail để hoàn tất thủ tục đăng nhập!');
        }
        return $next($request);
    }
}
