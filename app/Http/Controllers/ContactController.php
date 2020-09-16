<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends FrontendController
{
    public function getContact()
    {
        return view('contact');
    }

    public function saveContact(Request $request)
    {
        //cách insert mới
        $data =$request->except('_token'); //bỏ _token
        $data['created_at'] = $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Contact::insert($data);
        return redirect()->back();
    }
}
