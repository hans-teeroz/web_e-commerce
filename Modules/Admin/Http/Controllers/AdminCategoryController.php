<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::select('id','c_name','c_title_seo','c_active')->get();
        $viewData = [
            'categories' => $categories
        ];
        return view('admin::category.index',$viewData);
    }


    public function create()
    {
        return view('admin::category.create');
    }


    public function store(RequestCategory $requestCategory)
    {

       // dd($requestCategory->all());
        $this->insertOrupdate($requestCategory);
        return redirect()->route('admin.get.list.category')->with('success','Thêm mới thành công');
 }


//    public function show($id)
//    {
//        return view('admin::show');
//    }
//
//
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

//
    public function update(RequestCategory $requestCategory, $id)
    {
        $this->insertOrupdate($requestCategory,$id);
        return redirect()->route('admin.get.list.category')->with('success','Cập nhật thành công');

    }
    public function insertOrupdate($requestCategory,$id=''){
        $code = 1;
        try {
            $category = new Category();
            if($id){
                $category = Category::find($id); //nếu tồn tại id thì khởi tạo
            }
            $category->c_name            = $requestCategory->name;
            $category->c_slug            = str_slug($requestCategory->name);
            $category->c_icon            = $requestCategory->icon;
            $category->c_title_seo       = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("Lỗi trong hàm insertOrupdate Category".$exception->getMessage());
        }
        return $code;
    }
    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    //sdd('ok');
                    $category->c_active = $category->c_active ? 0 : 1;
                    $category->save();
                    $messages = 'Cập nhật thành công';
                    break;
            }

        }
        return redirect()->back()->with('success',$messages);
    }
//
//    public function destroy($id)
//    {
//        //
//    }
}
