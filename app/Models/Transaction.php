<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
//    protected $fillable = [
//        'phone'
//    ];
    protected $guarded =  ['*'];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const TR_PAY_COD = 0;
    const TR_PAY_PAYPAL = 1;
    protected $status = [
        1 => [
            'name' => 'Đã xử lý',
            'class' => 'label-danger'

        ],
        0 => [
            'name' => 'Chờ xử lý',
            'class' => 'label-default'
        ],
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->tr_status,'[N\A]');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'tr_user_id');
    }
//    public function getOrderproduct($id)
//    {
//        $rOrders = Order::with('getTran')->where('or_transaction_id',$id)->get();
//
//    }
}
