<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{

    public function index(Request $request)
    {

        $articles = Article::whereRaw(1);
        if($request->a_name) $articles->where('a_name','like','%'.$request->a_name.'%');
        $articles = $articles->orderByDesc('id')->paginate(10);
        $viewData = [
            'articles' => $articles,

        ];
        return view('admin::article.index',$viewData);
    }


    public function create()
    {
        return view('admin::article.create');
    }


    public function store(RequestArticle $requestArticle)
    {
        //dd($requestArticle->all());
        $this->insertOrupdateArticle($requestArticle);
        return redirect()->route('admin.get.list.article')->with('success','Thêm mới thành công');


    }




    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.update',compact('article'));
    }


    public function update(RequestArticle $requestArticle,$id)
    {
        $this->insertOrupdateArticle($requestArticle,$id);
        return redirect()->route('admin.get.list.article')->with('success','Cập nhật thành công');
    }



    public function insertOrupdateArticle($requestArticle,$id='')
    {
        $code = 1;
        try {
            $article = new Article();
            if($id){
                $article = Article::find($id); //nếu tồn tại id thì khởi tạo
            }//a_name của db
            $article->a_name            = $requestArticle->a_name;//name="a_name" bên html
            $article->a_slug            = str_slug($requestArticle->a_name);
            $article->a_description     = $requestArticle->a_description;
            $article->a_content         = $requestArticle->a_content;
            $article->a_title_seo       = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
            $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_title_seo : $requestArticle->a_description;

            if($requestArticle->hasFile('a_avatar')){
                $file = upload_image('a_avatar');
                if(isset($file['name'])){
                    $article->a_avatar = $file['name'];
                }
            }
            //dd($article->a_avatar);
            $article->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("Lỗi trong hàm insertOrupdateArticle".$exception->getMessage());
        }
        return $code;
    }
    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $article = Article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    //sdd('ok');
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article->save();
                    $messages = 'Cập nhật thành công';
                    break;
            }

        }
        return redirect()->back()->with('success',$messages);
    }
}
