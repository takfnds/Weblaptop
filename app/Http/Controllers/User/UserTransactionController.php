<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::where('t_user_id', get_data_user('web'))
        ->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('user.transaction.index', $viewData);
    }

    public function view($id)
    {
        $transaction = Transaction::where('t_user_id', get_data_user('web'))->find($id);
        $orders      = Order::with('product')->where('od_transaction_id', $id)->get();
        $viewData    = [
            'transaction' => $transaction,
            'orders'      => $orders
        ];

        return view('user.transaction.item', $viewData);
    }

    public function success($id)
    {
        $transaction = Transaction::find($id);
        $transaction->t_status = Transaction::STATUS_SUCCESS;
        $transaction->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $transaction = Transaction::find($id);
        if($transaction->t_status == Transaction::STATUS_DEFAULT)
        {
            $transaction->t_status = Transaction::STATUS_CANCEL;
            $transaction->save();
        }

        return redirect()->back();
    }
}
