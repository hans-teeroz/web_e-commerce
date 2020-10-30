<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestSystem;
use App\Models\System;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SystemAdminControlerController extends Controller
{

    public function index()
    {
        $system = System::find(1);
        return view('admin::system.index',compact('system'));
    }
    public function updateSystems(RequestSystem $requestSystem)
    {
        //dd($requestSystem->all());
        $system = new System();
        $system = System::find(1);
        $system->sys_name = $requestSystem->sys_name;
        $system->sys_info = $requestSystem->sys_info;
        $system->sys_address = $requestSystem->sys_address;
        $system->sys_email = $requestSystem->sys_email;
        $system->sys_phone = $requestSystem->sys_phone;
        $system->sys_open_hour = $requestSystem->sys_open_hour;
        $system->sys_title = $requestSystem->sys_title;
        $system->sys_fb = $requestSystem->sys_fb;
        $system->sys_zalo = $requestSystem->sys_zalo;
        if($requestSystem->hasFile('sys_avatar')){
            $file = upload_image('sys_avatar');
            if(isset($file['name'])){
                $system->sys_avatar = $file['name'];
            }
        }
        $system->save();
        return redirect()->route('admin.get.system')->with('success','Cập nhật thành công');
    }


}
