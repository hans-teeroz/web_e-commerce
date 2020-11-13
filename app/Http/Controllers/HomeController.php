<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Transaction;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends FrontendController
{
    public function __construct()
    {
       parent::__construct();
    }
    public function index(Request $request)
    {
        $categories = Category::where([
            'c_active' => Category::STATUS_PUBLIC
        ])->get();
        SEOTools::setTitle('Trang chủ');
        SEOTools::setDescription('Nơi cung cấp các sản phẩm công nghệ cao cấp!!');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        foreach ($categories as $category){
            SEOMeta::addKeyword([$category->c_name]);
        }

//        OpenGraph::addImage($request->url().pare_url_file($system->pro_avatar), ['height' => 300, 'width' => 300]);
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
        $productSelling = Product::where('pro_active', Product::STATUS_PUBLIC)->orderByDesc('pro_pay')->get();
        $productRandom = Product::inRandomOrder()->where('pro_active', Product::STATUS_PUBLIC)->limit(50)->get();
        $productSale = Product::where('pro_active', Product::STATUS_PUBLIC)->where('pro_sale','>',0)->orderByDesc('pro_sale')->limit(50)->get();
        $slides = Slide::where([
            'sls_active' => Slide::SLS_ACTIVE
        ])->orderByDesc('id')->limit(4)->get();
        //kiểm tra user đã login? gợi ý sản phẩm user da mua
        $listProductssuggest = [];
        if(get_data_user('web'))
        {
            $transactions = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status'  => Transaction::STATUS_PUBLIC
            ])->pluck('id');
            //dump($transactions);
            if (!empty($transactions))
            {
                //distinct() ko lay trung
                $listIdOrders = Order::whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');
                if (!empty($listIdOrders))
                {
                    $listIdCateProducts = Product::whereIn('id',$listIdOrders)->distinct()->pluck('pro_category_id');
                    if ($listIdCateProducts)
                    {
                        $listProductssuggest = Product::whereIn('pro_category_id',$listIdCateProducts)->limit(6)->get();
                        //dd($listProductssuggest);
                    }
                }

            }
        }
        $viewData = [
            "productHot"          => $productHot,
            "articleNews"         => $articleNews,
            "categoriesHome"      => $categoriesHome,
            "listProductssuggest" => $listProductssuggest,
            "productSelling"      => $productSelling,
            "productRandom"       => $productRandom,
            "productSale"         => $productSale,
            "slides"              =>$slides
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
