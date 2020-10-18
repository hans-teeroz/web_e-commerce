<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTransaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal;

class ShoppingCartController extends FrontendController
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('id', 'pro_name','pro_avatar', 'pro_price', 'pro_sale','pro_number')->find($id);
        if (!$product) return redirect('/');
        if ($product->pro_number < 1){
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }

        //dd(\Cart::content());
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

    public function updateProductItem(Request $request)
    {
        //dd($request->all());
        \Cart::update($request->key, $request->qty );
        return redirect()->back();
    }

    public function getFromPay()
    {
        $products = \Cart::content();
        $totalMoney = str_replace(',','', \Cart::subtotal(0,0));
        if ($totalMoney>0)
        {
            return view('shopping.pay', compact('products'));
        }
        return redirect('/')->with('warning','Bạn chưa mua hàng!');
    }

    public function saveInforShoppingCart(RequestTransaction $request)
    {
        $totalMoney = str_replace(',','', \Cart::subtotal(0,0));
        if ($totalMoney>0)
        {
            if ($request->payment == "cod")
            {
                $tr_payment = Transaction::TR_PAY_COD;
                $this->saveInfocartWhenOrder($request,$totalMoney,$tr_payment);
            }
            if ($request->payment == "paypal")
            {
                $pay = $this->payPal();

                return $pay;

            }

            return redirect('/')->with('success','Đơn hàng đang được xử lý!');
        }
        return redirect('/')->with('warning','Bạn chưa mua hàng!');

    }
    //thanh toán paypal thành công
    public function payPalSuccess(Request $request)
    {
        $provider = new ExpressCheckout();
        $token = $request->token;
        $PayerID = $request->PayerID;
        $response = $provider->getExpressCheckoutDetails($token);
        $invoiceId = $response['INVNUM'] ?? uniqid();

        $data= $this->cartData($invoiceId);
        $totalMoney = str_replace(',','', $data['total_vnd']);


        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
        $this->saveInfocartWhenOrder($request,$totalMoney,$data['payment']);

       // dd($response);
        //$status = $response['PAYMENTINFO_0_ACK'];
        return redirect('/')->with('success','Thanh toán thành công. Đơn hàng đang được xử lý!');


    }
    public function saveInfocartWhenOrder($request,$totalMoney,$tr_payment)
    {
        $code = 1;
        try {
            //$totalMoney = str_replace(',','', \Cart::subtotal(0,0));
                $transactionId = Transaction::insertGetId([
                    'tr_user_id' => get_data_user('web'),
                    'tr_total'   => (int)$totalMoney,
                    'tr_note'    => $request->note,
                    'tr_address' => $request->address,
                    'tr_phone'   => $request->phone_number,
                    'tr_payment' => $tr_payment,
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


        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("Lỗi trong hàm saveInfocartWhenOrder ShoppingCart".$exception->getMessage());
        }
        return $code;
    }
    //xử lý thanh toán paypal
    public function payPal()
    {

        $provider = new ExpressCheckout();
        $invoiceId = uniqid();
        $data= $this->cartData($invoiceId);
        //$response = $provider->setExpressCheckout($data);
        $response =$provider->setCurrency('USD')->setExpressCheckout($data);
        //dd($response);
        return redirect($response['paypal_link']);

    }
    protected function cartData($invoiceId)
    {
        $data = [];
        $data['items'] =[];
        $products = \Cart::content();
        $setCurrency = 23000;
        foreach ($products as $key => $product)
        {
            $itemDetail = [
                'id' =>  $product->id,
                'name' =>  $product->name,
                'price' =>  round(($product->price/$setCurrency), 2),
                'qty'   => $product->qty
            ];

            $data['items'][] = $itemDetail;
        }
        //dd($data);
        //$data['info_user'] = $requestTransaction;
        $data['user_id'] = get_data_user('web');
        $data['payment'] = Transaction::TR_PAY_PAYPAL;
        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = "test invoice";
        $data['return_url'] = route('get.paypal.success');
        $data['cancel_url'] = url('/test');
        $data['total_vnd'] = \Cart::subtotal(0,0);
        $total = 0;
        foreach ($data['items'] as $item)
        {
            $total += round(($item['price'] * $item ['qty']), 2);
        }
        $data['total'] = $total;
        // $data['total'] = round($data['total'], 2);

        return $data;
    }
}
