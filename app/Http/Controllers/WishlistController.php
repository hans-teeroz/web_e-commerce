<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class WishlistController extends FrontendController
{
    public function index(Request $request)
    {
        SEOTools::setTitle('Danh sách yêu thích');
        SEOTools::setDescription('Danh sách yêu thích của bạn', 'UTF-8');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        $userId =get_data_user('web');
        $products = Product::whereHas('wishlist', function ($query) use ($userId){
            $query->where('w_user_id',$userId);
        })->select('id','pro_name','pro_slug','pro_price','pro_sale','pro_avatar')->paginate(10);
        return view('user.wishlist',compact('products'));
    }
    public function saveWishlist(Request $request,$id)
    {

        if ($request->ajax())
        {
            $product = Product::find($id);
            if (!$product) return response(['msg' => 'Không tồn tại sản phẩm']);
            $msg = 'Thêm sản phẩm yêu thích thành công';
            try {
                \DB::table('wishlists')->insert(['w_product_id' => $id, 'w_user_id' => get_data_user('web')]);
            }
            catch (\Exception $exception){
                $msg = 'Sản phẩm này đã có trong danh sách yêu thích';
            }
            return response(['msg' => $msg]);
        }
    }
    public function action($action, $id)
    {
        if($action){
            $messages = '';
            switch ($action) {
                case 'delete':
                    $wishlish = Wishlist::where([
                        'w_product_id'=>$id,
                        'w_user_id' => get_data_user('web')
                    ]);
                    $wishlish->delete();
                    $messages = 'Xóa thành công';
                    break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
