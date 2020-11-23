<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->url();
        dd($url);
        $articles = Article::all()->first();
        $categories = Category::all()->first();
        $products = Product::all()->first();
        return response()->view('sitemap.index', [
            'articles' => $articles,
            'categories' => $categories,
            'products' => $products,
            'url'      => $url
        ])->header('Content-Type', 'text/xml');
    }
    public function articles(Request $request)
    {
        $url = explode('/sitemap1.xml/',$request->url(),2)[0];
        $articles = Article::latest()->get();
        return response()->view('sitemap.articles', [
            'articles' => $articles,
            'url'      => $url
        ])->header('Content-Type', 'text/xml');
    }

    public function categories(Request $request)
    {
        $url = explode('/sitemap1.xml/',$request->url(),2)[0];
        $categories = Category::all();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
            'url'      => $url
        ])->header('Content-Type', 'text/xml');
    }

    public function products(Request $request)
    {
        $url = explode('/sitemap1.xml/',$request->url(),2)[0];
        $products = Product::latest()->get();
        return response()->view('sitemap.products', [
            'products' => $products,
            'url'      => $url
        ])->header('Content-Type', 'text/xml');
    }
}
