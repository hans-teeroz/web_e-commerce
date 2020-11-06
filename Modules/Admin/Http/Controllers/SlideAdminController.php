<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Slide;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function Sodium\compare;
use Illuminate\Http\Response;

class SlideAdminController extends Controller
{

    public function index()
    {
        $slides = Slide::select('*')->orderByDesc('id')->get();
        $viewData = [
            'slides' => $slides
        ];
        return view('admin::slide.index',$viewData);
    }

    public function create()
    {
        return view('admin::slide.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('images'))
        {
            $imageName = new Slide();
            //$imageName->sls_avatar = $request->images->getClientOriginalName();
            $file = upload_image('images','slides');
            if(isset($file['name'])){
                $imageName->sls_avatar = $file['name'];

            }
            //$request->images->move(public_path('slides'), $imageName->sls_avatar);
            $imageName->save();
        }
        return \response()->json(['uploaded' => '/slides/'.$imageName->sls_avatar]);
    }
    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $slide = Slide::find($id);
            switch ($action) {
                case 'delete':
                    $slide -> delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    // dd('ok');
                    $slide ->sls_active = $slide ->sls_active ? 0 : 1;
                    $slide->save();
                    $messages = 'Cập nhật thành công';
                    break;
                case 'banner_home':
                    //dd('ok');
                    $slide ->sls_banner_home = $slide ->sls_banner_home ? 0 : 1;
                    $slide->save();
                    $messages = 'Cập nhật thành công';
                    break;
                case 'banner_cate':
                    //dd('ok');
                    $slide ->sls_banner_category = $slide ->sls_banner_category ? 0 : 1;
                    $slide->save();
                    $messages = 'Cập nhật thành công';
                    break;
            }
            //$product->save();
        }
        return redirect()->back()->with('success',$messages);
    }

}
