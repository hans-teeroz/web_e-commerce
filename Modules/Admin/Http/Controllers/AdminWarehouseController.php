<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminWarehouseController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        $conlumn = 'id';
        if ($request->type && $request->type == 'selling')
        {
            $conlumn = 'pro_pay';
        }
        else
        {
            $products->where('pro_number', '>=',50);
        }
        //Tìm sp
        if($request->name) $products->where('pro_name','like', '%'.$request->name.'%');
        //Lọc sp theo danh mục
        if($request->cate) $products->where('pro_category_id','=', $request->cate);
        //Đưa sp ms thêm lên đầu

        $products = $products->orderByDesc($conlumn)->paginate(10);
        //$products = Product::with('category:id,c_name')->paginate(10);

        $categories = $this->getCategory();
        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin::warehouse.index',$viewData);
    }
    public function getCategory()
    {
        return Category::all();
    }

}
