<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function getRssFeed(Request $request)
    {
        SEOTools::setTitle('Tin tức');
        SEOTools::setDescription('Tin mới nhất được cập nhật liên tục từ nguồn VnExpress');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        $url_new = "https://vnexpress.net/rss/tin-moi-nhat.rss";
        $url_hot = "https://vnexpress.net/rss/tin-noi-bat.rss";
        $url_world = "https://vnexpress.net/rss/the-gioi.rss";
        $articlesrss = $this->getRss($url_new);
        $articlesrss_hots = $this->getRss($url_hot);
        $articlesrss_worlds = $this->getRss($url_world);
        $viewData = [
              'articlesrss'        => $articlesrss,
              'articlesrss_hots'   => $articlesrss_hots,
              'articlesrss_worlds' => $articlesrss_worlds

        ];
        return view('rss_feed.index',$viewData);
    }
    public function getRss($url)
    {
        $feeds = "";
        if (@simplexml_load_file($url)) {
            $feeds = simplexml_load_file($url);
            $articlesrss = $feeds->channel;
        }
        return $articlesrss;
    }
    public function getListArticle(Request $request)
    {
        SEOTools::setTitle('Bài viết');
        SEOTools::setDescription('Tin mới nhất từ công nghệ, cập nhật liên tục');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        $articles = Article::where([
            'a_active' => Article::STATUS_PUBLIC,
        ])->orderByDesc('id')->paginate(5);
        $articlesHot = Article::where([
            'a_active' => Article::STATUS_PUBLIC,
            'a_hot'     => Article::HOT
        ])->orderByDesc('id')->limit(3)->get();
        $viewData = [
              'articles'     => $articles,
              'articlesHot'  => $articlesHot
        ];
        return view('article.index',$viewData);
    }
    public function articleDetail(Request $request)
    {
        $url = $request->segment(2);
        if ($url)
        {

            $articleDetail = Article::where([
               'a_slug' => $url,
               'a_active' => Article::STATUS_PUBLIC,
            ])->get()->first();
            $articleId = $articleDetail->id;
            if ($articleId > 0){
                $articleDetailPrevId  = $articleId -1;
                $articleDetailPNextId = $articleId +1;
                $articleDetailPrev    = Article::where('id',$articleDetailPrevId)->get()->first();
                $articleDetailPNext   = Article::where('id',$articleDetailPNextId)->get()->first();
            }
            $articlesHot = Article::where([
                'a_active' => Article::STATUS_PUBLIC,
                'a_hot'     => Article::HOT
            ])->orderByDesc('id')->limit(3)->get();
            $viewData = [
                'articleDetail'      => $articleDetail,
                'articleDetailPrev'  => $articleDetailPrev,
                'articleDetailPNext' => $articleDetailPNext,
                'articlesHot'        => $articlesHot
            ];
            SEOTools::setTitle($articleDetail->a_title_seo);
            SEOTools::setDescription($articleDetail->a_description_seo);
            SEOTools::opengraph()->setUrl($request->url());
            SEOTools::setCanonical($request->url());
            return view('article.detail', $viewData);
        }
        return redirect('/');

    }
}
