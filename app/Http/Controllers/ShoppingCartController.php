<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTransaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal;

class ShoppingCartController extends FrontendController
{
    private $vnp_TmnCode = "SG4NVCBO"; //Mã website tại VNPAY
    private $vnp_HashSecret = "QUEJZNJNWJUTVFJEQAVBRRLFSIBKYTXB"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //private $vnp_Returnurl = route('get.vnpay.success');
    public function  __construct()
    {

        parent::__construct();
    }

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
    public function getListShoppingCart(Request $request)
    {
        SEOTools::setTitle('Giỏ hàng');
        SEOTools::setDescription('Shopping theo phong cách của bạn');
        SEOTools::opengraph()->setUrl($request->url());
        SEOTools::setCanonical($request->url());
        $products = \Cart::content();
        //dd($products);
        return view('shopping.index', compact('products'));
    }
    public function deleteProductItem($key)
    {
        \Cart::remove($key);
        return redirect()->back()->with('success','Xóa sản phẩm thành công');
    }

    public function updateProductItem(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if (!$product) return response('Lỗi! Không tồn tại sản phẩm');
        $price = number_format($request->qty * ($product->pro_price-($product->pro_price*$product->pro_sale)/100));
        if ($product->pro_number < $request->qty)
        {
            $price = number_format($product->pro_number * ($product->pro_price-($product->pro_price*$product->pro_sale)/100));
            return response()->json(['price' => $price,'msg'=>'Lỗi! Không đủ số lượng sản phẩm']);
        }
        \Cart::update($request->key, $request->qty );
        return response()->json(['data' =>\Cart::subtotal(0,0), 'id'=>$id,'price' => $price,'msg'=>'Cập nhật giỏ hàng thành công!']);
        //return redirect()->back()->with('success','Cập nhật giỏ hàng thành công');
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
        //dd($request->all());
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
            if ($request->payment == "vnpay")
            {
                //dd($request->all());
                if ($request->payment == "vnpay")
                {
                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    $inputData = array(
                        "vnp_Version" => "2.0.0",
                        "vnp_TmnCode" => $this->vnp_TmnCode,
                        "vnp_Amount" => $totalMoney*100, //tổng tiền
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'], //IP
                        "vnp_Locale" => $request->language, //ngon ngữ
                        "vnp_OrderInfo" => $request->note != "" ? $request->note : "Nội dung thanh toán", //nội dung thanh toán
                        "vnp_OrderType" => $request->order_type, //hình thức thanh toán
                        "vnp_ReturnUrl" => route('get.vnpay.success'), //url trả về
                        "vnp_TxnRef" => $request->order_id, //mã đơn hàng
                    );

                    if ($request->bank_code)
                    {
                        $inputData['vnp_BankCode'] = $request->bank_code;
                    }
                    ksort($inputData);

                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . $key . "=" . $value;
                        } else {
                            $hashdata .= $key . "=" . $value;
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }
                    $vnp_Url = $this->vnp_Url . "?" . $query;

                    if ($this->vnp_HashSecret) {
                        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                        $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
                        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array
                    (
                        'code' => '00',
                        'message' => 'success',
                        'data' => $vnp_Url
                    );
                    //dd($returnData);
                    return redirect($returnData['data']);
                }

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
        //dd($response);
        $this->saveInfocartWhenOrder($request,$totalMoney,$data['payment']);

       // dd($response);
        //$status = $response['PAYMENTINFO_0_ACK'];
        return redirect('/')->with('success','Thanh toán thành công. Đơn hàng đang được xử lý!');
    }

    //thanh toán vnpay thành công
    public function vnPaySuccess(Request $request)
    {
        //dd($request->all());
        $totalMoney =  $request->vnp_Amount/100;
        $tr_payment = Transaction::TR_PAY_VNPAY;
        if ($request->vnp_ResponseCode == "00")
        {
            $this->saveInfocartWhenOrder($request,$totalMoney,$tr_payment);
            return redirect('/')->with('success','Thanh toán thành công. Đơn hàng đang được xử lý!');
        }
        return redirect('/')->with('danger','Thanh toán thất bại! Vui lòng kiểm tra lại!!!');

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
                    'tr_address' => isset($request->address ) ? $request->address  :get_data_user('web','address'),
                    'tr_phone'   => isset($request->phone_number) ? $request->phone_number :get_data_user('web','phone'),
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
