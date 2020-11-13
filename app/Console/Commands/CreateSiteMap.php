<?php

namespace App\Console\Commands;

use Carbon;
use Illuminate\Console\Command;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $sitemap = \App::make('sitemap');
        // add home pages mặc định
        $sitemap->add(URL::to('/'), \Illuminate\Support\Carbon::now(), 1, 'daily');

        // add bài viết
        $posts = \DB::table('articles')->orderBy('created_at', 'desc')->get();
        foreach ($posts as $post) {
            //$sitemap->add(url, thời gian, độ ưu tiên, thời gian quay lại)
            $sitemap->add($request.$post->a_slug, $post->updated_at, 1, 'daily');
        }
        $categories = \DB::table('categories')->orderBy('created_at', 'desc')->get();
        foreach ($categories as $category) {
            //$sitemap->add(url, thời gian, độ ưu tiên, thời gian quay lại)
            $sitemap->add($request.$category->c_slug, $category->updated_at, 1, 'daily');
        }
        $products = \DB::table('products')->orderBy('created_at', 'desc')->get();
        foreach ($products as $product) {
            //$sitemap->add(url, thời gian, độ ưu tiên, thời gian quay lại)
            $sitemap->add($request.$product->pro_slug, $product->updated_at, 1, 'daily');
        }
        // lưu file và phân quyền
        $sitemap->store('xml', 'sitemap');
        if (\File::exists(public_path('sitemap.xml'))) {
            chmod(public_path('sitemap.xml'), 0777);
        }
    }
}
