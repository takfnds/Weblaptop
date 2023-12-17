<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BackendOrderController extends Controller
{
    public function delete($id)
    {
        $order = Order::find($id);
        if($order)
        {
            $totalMoney = $order->od_qty * $order->od_price;
            $transaction = Transaction::find($order->od_transaction_id);
            $transaction->t_total_money -= $totalMoney;
            $transaction->save();
            $order->delete();
        }

        return redirect()->back();
    }
}
