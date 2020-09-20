<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function getListArticle()
    {
        $articles = Article::where([
            'a_active' => Article::STATUS_PUBLIC,
        ])->orderByDesc('id')->get();
        $viewData = [
              'articles' => $articles
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
            $viewData = [
                'articleDetail'      => $articleDetail,
                'articleDetailPrev'  => $articleDetailPrev,
                'articleDetailPNext' => $articleDetailPNext
            ];
            return view('article.detail', $viewData);
        }
        return redirect('/');

    }
}
