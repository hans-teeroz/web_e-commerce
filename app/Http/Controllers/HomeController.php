<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
            'a_active' => Article::STATUS_PUBLIC
        ])->orderBy('id', 'DESC')->limit(5)->get();
        //$articleNews = $articleNews->orderBy('id', 'DESC')->limit(5)->get();
        $viewData = [
            "productHot" => $productHot,
            "articleNews" => $articleNews
        ];
        return view('home.index',$viewData);
    }
}
