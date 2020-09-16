<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::select('*')->orderByDesc('id')->get();
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index', $viewData);
    }

    public function action($action, $id)
    {
        if($action){
            $messages = '';
            $transaction = Transaction::find($id);

            $orders = Order::where('or_transaction_id',$id)->get();

            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    $messages = 'Xóa thành công';
                    break;
                case 'active':
                    //sdd('ok');
                    //tru sl sp khi đã mua hàng
                    if ($orders)
                    {

                        foreach ($orders as $order)
                        {
                            $product = Product::find($order->or_product_id);
                            //check sl sp nếu còn hàng && sl sp >= sl sp đặt hàng thì ms cập nhật đơn hàng thành công
                            if ($product->pro_number > 0 && $product->pro_number >= $order->or_qty){
                                $product->pro_number = $product->pro_number - $order->or_qty;
                                $product->pro_pay++;
                                $product->save();
                                $transaction->tr_status = Transaction::STATUS_PUBLIC;
                                $transaction->save();
                                $messages = 'Đơn hàng đã được xử lý rồi!!';
                            }
                            else
                            {
                                $transaction->tr_status = Transaction::STATUS_PRIVATE;
                                $transaction->save();
                                $messages = 'Lỗi xử lý...!!';
                                return redirect()->back()->with('danger',$messages);
                                break;
                            }
                        }


                    }
                    //cập nhật users nào mua hàng nhiều nhất
                    \DB::table('users')->where('id',$transaction->tr_user_id)
                        ->increment('total_pay');
                    break;
                case 'error':
                    //sdd('ok');
                    $messages = 'Lỗi xử lý...!!';
                    return redirect()->back()->with('danger',$messages);
                    break;

            }


        }
        return redirect()->back()->with('success',$messages);
    }

    public function viewOrders(Request $request,$id)
    {
        //dd($request->ajax());
        if ($request->ajax())
        {
            $orders = Order::with('getTran')->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order', compact('orders'))->render();
            //dd($html);
            return \response()->json($html);
        }

    }


}
