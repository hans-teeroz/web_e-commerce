<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('id', 'pro_name','pro_avatar', 'pro_price', 'pro_sale','pro_number')->find($id);
        if (!$product) return redirect('/');
        if ($product->pro_number < 1){
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }
        \Cart::add([
            'id' => $id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price-($product->pro_price*$product->pro_sale)/100,
            'options' => [
                'pro_avatar' => $product->pro_avatar,
                'price_sale' => $product->pro_sale,
                'price_old'  => $product->pro_price
            ]
        ]);

        return redirect()->back()->with('success','Đã thêm vào giỏ hàng thành công');
    }
    public function getListShoppingCart()
    {
        $products = \Cart::content();
        //dd($products);
        return view('shopping.index', compact('products'));
    }
    public function deleteProductItem($key)
    {
        \Cart::remove($key);
        return redirect()->back();
    }

    public function updateProductItem($key)
    {
        \Cart::update($key, 'pro_sale');
        return redirect()->back();
    }

    public function getFromPay()
    {
        $products = \Cart::content();
        return view('shopping.pay', compact('products'));
    }
    public function saveInforShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',','', \Cart::subtotal(0,0));
        //dd($totalMoney);
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total'   => (int)$totalMoney,
            'tr_note'    => $request->note,
            'tr_address' => $request->address,
            'tr_phone'   => $request->phone_number,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($transactionId){
            $products = \Cart::content();
            foreach ($products as $product)
            {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id'     => $product->id,
                    'or_qty'            => $product->qty,
                    'or_price'          => $product->options->price_old,
                    'or_sale'           => $product->options->price_sale,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                    'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                ]);
            }
        }
        \Cart::destroy();
        return redirect('/')->with('success','Đơn hàng đang được xử lý!');
    }
}
