<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::select('id','c_name','c_email','c_title','c_content','c_status')->get();
        $viewData = [
            'contacts' => $contacts
        ];
        return view('admin::contact.index',$viewData);
    }
    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $contact = Contact::find($id);
            switch ($action) {
                case 'delete':
                    $contact->delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    //sdd('ok');
                    $contact->c_status = $contact->c_status ? 0 : 1;
                    $contact->save();
                    $messages = 'Cập nhật thành công';
                    break;
            }

        }
        return redirect()->back()->with('success',$messages);
    }

}
