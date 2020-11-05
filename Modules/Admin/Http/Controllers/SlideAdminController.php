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

}
