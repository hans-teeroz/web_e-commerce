<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
       parent::__construct();
    }
    public function index()
    {
        $productHot = Product::where([
            'pro_hot' => Product::STATUS_hot,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();
        $articleNews = Article::where([
            'a_active' => Article::STATUS_PUBLIC,
            'a_hot'    => Article::STATUS_PUBLIC
        ])->orderBy('id', 'DESC')->limit(3)->get();
        //$articleNews = $articleNews->orderBy('id', 'DESC')->limit(5)->get();
        $categoriesHome = Category::with('products')
            ->where('c_hot',1)->limit(3)->get();
        $viewData = [
            "productHot"   => $productHot,
            "articleNews"  => $articleNews,
            "categoriesHome"  => $categoriesHome
        ];
        return view('home.index',$viewData);
    }
    //sp đã xem
    public function viewedProduct(Request $request)
    {
        if ($request->ajax())
        {
            $listId = $request->id;
            $productViewed = Product::whereIn('id',$listId)->get();
            $html = view('components.viewedproduct',compact('productViewed'))->render();
            return response()->json(['data' => $html]);
        }

    }
}
