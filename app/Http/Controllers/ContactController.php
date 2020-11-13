<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends FrontendController
{
    public function getContact(Request $request)
    {
        SEOTools::setTitle('Liên hệ');
        SEOTools::setDescription('Nơi bạn có thể trao đổi và gửi những yêu cầu thắc mắc cho chúng tôi');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        return view('contact');
    }

    public function saveContact(Request $request)
    {
        //cách insert mới
        //dd($request->all());
        $data =$request->except('_token'); //bỏ _token
        $data['created_at'] = $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Contact::insert($data);
        return redirect()->back();
    }
}
