<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function delete($id)
    {
        $order = Order::find($id);
        if($order)
        {
            $totalMoney = $order->od_qty * $order->od_price;
            $transaction = Transaction::find($order->od_transaction_id);
            if($transaction->t_status == Transaction::STATUS_DEFAULT) {
                $transaction->t_total_money -= $totalMoney;
                $transaction->save();
                $order->delete();
            }
        }

        return redirect()->back();
    }
}
