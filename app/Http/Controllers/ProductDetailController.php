<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        //$url = preg_split('/(-)/i',$url);
        if ($url)
        {
            $productsDetail = Product::where([
                'pro_active' => Product::STATUS_PUBLIC,
                'pro_slug' => $url
            ])->first();
            SEOTools::setTitle($productsDetail->pro_title_seo);
            SEOTools::setDescription($productsDetail->pro_description_seo);
            SEOTools::opengraph()->setUrl($request->url());
            SEOTools::setCanonical($request->url());
            OpenGraph::addImage(explode('/san-pham/',$request->url(),2)[0].pare_url_file($productsDetail->pro_avatar), ['height' => 300, 'width' => 300]);
            //dd($productsDetail);
            $productNew = Product::where('pro_active', Product::STATUS_PUBLIC)->orderByDesc('id')->limit(50)->get();
            $viewData = [
                'productsDetail' => $productsDetail,
                'productNew' => $productNew
            ];
            return view('product.detail', $viewData);
        }
//        if($id = array_pop($url))
//        {
//            $productsDetail = Product::where([
//                'pro_active' => Product::STATUS_PUBLIC
//            ])->find($id);
//            //dd($productsDetail);
//            $viewData = [
//                'productsDetail' => $productsDetail
//            ];
//            return view('product.detail', $viewData);
//        }
        return redirect('/');
    }
}
