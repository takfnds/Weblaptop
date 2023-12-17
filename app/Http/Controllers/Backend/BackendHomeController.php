<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BackendHomeController extends Controller
{
    public function index()
    {
        $countUser        = User::select('id')->count();
        $countProduct     = Product::select('id')->count();
        $countArticle     = Article::select('id')->count();
        $countTransaction = Transaction::select('id')->count();

        $transactions = Transaction::orderByDesc('id')
            ->limit(10)
            ->get();

        $users = User::orderByDesc('id')
            ->limit(10)
            ->get();

        $month  = date('m');
        $status = (new Transaction())->getStatus();

        $viewData = [
            'countUser'        => $countUser,
            'status'           => $status,
            'month'            => $month,
            'countProduct'     => $countProduct,
            'countTransaction' => $countTransaction,
            'countArticle'     => $countArticle,
            'transactions'     => $transactions,
            'users'            => $users,
        ];
        return view('backend.index', $viewData);
    }

    public function ajaxGetChars(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::whereRaw(1);

            if ($status = $request->status)
                $transactions->where('t_status', $status);

            $month = date('m');
            if ($request->month)
                $month = $request->month;

            $transactions = $transactions
                ->whereMonth('created_at', $month)
                ->select(\DB::raw('sum(t_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
                ->groupBy('day')
                ->get()->toArray();

            $listDay                     = $this->getListDayInMonth($month);
            $arrRevenueTransactionsMonth = [];

            foreach ($listDay as $day) {
                $total = 0;
                foreach ($transactions as $key => $revenue) {
                    if ($revenue['day'] == $day) {
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrRevenueTransactionsMonth[] = (int)$total;
            }

            return response()->json([
                'listDay'                     => json_encode($listDay),
                'arrRevenueTransactionsMonth' => json_encode($arrRevenueTransactionsMonth),
            ]);
        }
    }

    public function getListDayInMonth($month = 0)
    {
        $arrayDay = [];

        if (!$month)
            $month = date('m');

        $year = date('Y');
        // Lấy tất cả các ngày trong tháng
        for ($day = 1; $day <= 31; $day++) {
            $time = mktime(12, 0, 0, $month, $day, $year);
            if (date('m', $time) == $month)
                $arrayDay[] = date('Y-m-d', $time);
        }

        return $arrayDay;
    }
}
