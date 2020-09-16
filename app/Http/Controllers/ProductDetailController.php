<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url))
        {
            $productsDetail = Product::where([
                'pro_active' => Product::STATUS_PUBLIC
            ])->find($id);
            //dd($productsDetail);
            $viewData = [
                'productsDetail' => $productsDetail
            ];
            return view('product.detail', $viewData);
        }
        return redirect('/');
    }
}
