<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function getListArticle()
    {
        return view('article.index');
    }
}
