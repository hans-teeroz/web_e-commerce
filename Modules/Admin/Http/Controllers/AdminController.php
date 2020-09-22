<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class AdminController extends Controller
{

    public function index()
    {
        $numTran = Transaction::select('id')->where('tr_status',0)->count();
        $numUser = User::select('id')->where('active',1)->count();
        $transactionNews = Transaction::select('*')->limit(3)->orderByDesc('id')->get();
//        $range = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subYears(5);
//        $orderYear = DB::table('transactions')
//            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))
//            ->where('created_at', '>=', $range)
//            ->groupBy('getYear')
//            ->orderBy('getYear', 'ASC')
//            ->get();
//        //dd($orderYear);
//        $rangeDay = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
//        $get_range = date_format($rangeDay,"Y-m-d");
//        $date_range = date_format($rangeDay,"Y-m-d");
//        $sumproductDay = DB::table('transactions')
//            ->select(DB::raw('SUM(or_qty) as countProduct'))
//            ->join('orders', 'transactions.id', '=', 'orders.or_transaction_id')
//            ->join('products', 'orders.or_product_id', '=', 'products.id')
//            ->where(DB::raw("DATE_FORMAT(transactions.created_at, '%Y-%m-%d') ") , '=', $get_range)
//            ->groupBy(DB::raw("DATE_FORMAT(transactions.created_at, '%Y-%m-%d')"))
//            ->first();
//        //dd($sumproductDay);
//        if ($sumproductDay == null)
//        {
//            return view('admin::index',compact('numTran','numUser','orderYear'));
//        } else {
//
//            $totalProduct = (INT)($sumproductDay->countProduct);
//
//            $percentProduct = round((100 / $totalProduct), 3);
//
//            $productBuy = DB::table('transactions')
//                ->select(DB::raw("products.id as id"), DB::raw("SUM(orders.or_qty) * $percentProduct as y"),DB::raw("products.pro_name as name"))
//                ->join('orders', 'transactions.id', '=', 'orders.or_transaction_id')
//                ->join('products', 'orders.or_product_id', '=', 'products.id')
//                ->where(DB::raw("DATE_FORMAT(transactions.created_at, '%Y-%m-%d') "), '=', $get_range)
//                ->groupBy('id','name')
//                ->get();
////            SELECT SUM(orders.or_qty), products.pro_name as name FROM `transactions` JOIN orders ON transactions.id = orders.or_transaction_id JOIN products ON products.id = orders.or_product_id AND transactions.created_at = '2020-09-01 21:26:43' GROUP BY orders.or_product_id
////            return view('fdfadmin.chart.view_order', compact('productBuy', 'date_range'));
//            return view('admin::index',compact('numTran','numUser','orderYear','productBuy', 'date_range'));
//        }
        //Doanh thu ngày
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');

        //Doanh thu tháng
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        //Doanh thu năm
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        $dataMoney = [
            [
                "name" => "Doanh thu ngày",
                "y"    => (int)$moneyDay
            ],
            [
                "name" => "Doanh thu tháng",
                "y"    => (int)$moneyMonth
            ],
            [
                "name" => "Doanh thu năm",
                "y"    => (int)$moneyYear
            ],
        ];
        $viewData = [
            'numTran' => $numTran,
            'numUser' => $numUser,
            'moneyMonth' => $moneyMonth,
            'moneyDay' => $moneyDay,
            'dataMoney' => json_encode($dataMoney),
            'transactionNews' => $transactionNews
        ];
        return view('admin::index',$viewData);
    }


    public function create()
    {
        return view('admin::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('admin::show');
    }


    public function edit($id)
    {
        return view('admin::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
