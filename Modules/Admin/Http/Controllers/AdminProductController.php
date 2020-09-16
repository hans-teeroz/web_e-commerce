<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        //Tìm sp
        if($request->name) $products->where('pro_name','like', '%'.$request->name.'%');
        //Lọc sp theo danh mục
        if($request->cate) $products->where('pro_category_id','=', $request->cate);
        //Đưa sp ms thêm lên đầu

        $products = $products->orderByDesc('id') ->paginate(10);
        //$products = Product::with('category:id,c_name')->paginate(10);

        $categories = $this->getCategory();
        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];

        return view('admin::product.index',$viewData);
    }


    public function create()
    {
        $categories = $this->getCategory();

        return view('admin::product.create',compact('categories'));
    }


    public function store(RequestProduct $requestProduct)
    {
        //dd($requestProduct->all());
        $this->insertOrupdateProduct($requestProduct);
        return redirect()->route('admin.get.list.product')->with('success','Thêm mới thành công');
    }


    public function show($id)
    {
        return view('admin::show');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategory();
        return view('admin::product.update',compact('product','categories'));
    }


    public function update(RequestProduct $requestProduct, $id)
    {
        //dd($requestProduct->all(), $id);
        $this->insertOrupdateProduct($requestProduct,$id);
        return redirect()->route('admin.get.list.product')->with('success','Cập nhật thành công');
    }


    public function destroy($id)
    {
        //
    }
    public function insertOrupdateProduct($requestProduct,$id='')
    {
        $code = 1;
        try {
            $product = new Product();
            if($id){
                $product = Product::find($id); //nếu tồn tại id thì khởi tạo
            }//pro_name của db
            $product->pro_name            = $requestProduct->pro_name;//name="pro_name" bên html
            $product->pro_slug            = str_slug($requestProduct->pro_name);
            $product->pro_category_id     = $requestProduct->pro_category_id;
            $product->pro_price           = $requestProduct->pro_price;
            $product->pro_sale            = $requestProduct->pro_sale;
            $product->pro_description     = $requestProduct->pro_description;
            $product->pro_content         = $requestProduct->pro_content;
            $product->pro_number          = $requestProduct->pro_number;
            $product->pro_title_seo       = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
            $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_description;

            //$product->pro_active          = $requestProduct->pro_active;
            if($requestProduct->hasFile('pro_avatar')){
                $file = upload_image('pro_avatar');
                if(isset($file['name'])){
                    $product->pro_avatar = $file['name'];
                }
            }

            $product->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("Lỗi trong hàm insertOrupdateProduct".$exception->getMessage());
        }
        return $code;
    }
    public function getCategory()
    {
        return Category::all();
    }

    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $product = Product::find($id);
            switch ($action) {
                case 'delete':
                    $product -> delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    // dd('ok');
                    $product ->pro_active = $product ->pro_active ? 0 : 1;
                    $product->save();
                    $messages = 'Cập nhật thành công';
                    break;
                case 'hot':
                    //dd('ok');
                    $product ->pro_hot = $product ->pro_hot ? 0 : 1;
                    $product->save();
                    $messages = 'Cập nhật thành công';
                    break;
            }
            //$product->save();
        }
        return redirect()->back()->with('success',$messages);
    }
}
