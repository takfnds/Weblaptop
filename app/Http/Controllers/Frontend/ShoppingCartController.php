<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $products = \Cart::content();
        $viewData = [
            'products' => $products
        ];
        return view('frontend.shopping.index', $viewData);
    }

    public function checkout()
    {
        $products = \Cart::content();
        $user     = User::find(get_data_user('web'));
        $viewData = [
            'user'     => $user,
            'products' => $products
        ];
        return view('frontend.shopping.checkout', $viewData);
    }

    public function update(Request $request)
    {
        $qty = $request->qty ?? [];
        $products = $request->products ?? [];
        foreach ($request->ids as  $key => $item) {
            try {
                $productID = $products[$key];
                $product = Product::find($productID);
                if($product && $product->pro_number >= $qty[$key])
                {
                    \Cart::update($item, $qty[$key]); // Will update the quantity
                }
            } catch (\Exception $exception) {

            }
        }

        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function pay(Request $request)
    {
        $dataTransaction                  = $request->except('_token');
        $dataTransaction['created_at']    = Carbon::now();
        $dataTransaction['t_user_id']     = get_data_user('web') ?? 0;
        $dataTransaction['t_note']        = 'Nhận hàng mới thanh toán';
        $dataTransaction['t_total_money'] = (int)str_replace(',', '', \Cart::subtotal(0));
        $transaction                      = Transaction::create($dataTransaction);
        if ($transaction) {
            $products = \Cart::content();
            foreach ($products as $item) {
                Order::create([
                    'od_transaction_id' => $transaction->id,
                    'od_product_id'     => $item->id,
                    'od_qty'            => $item->qty,
                    'od_price'          => $item->price,
                    'created_at'        => Carbon::now()
                ]);
            }
        }

        \Cart::destroy();

        if ($request->t_type == 1) {
            return redirect()->route('get.shopping.success', ['transactionID' => $transaction->id]);
        }else {
            $vnp_TmnCode = "N52FKIUG"; //Mã định danh merchant kết nối (Terminal Id)
            $vnp_HashSecret = "TSIRMJKBXWGVEZWEINMWHTCTDKCAVPYA"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('get.shopping.success', ['transactionID' => $transaction->id]);
            $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
            $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));


            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            /**
             *
             *
             * @author CTT VNPAY
             */

            $vnp_TxnRef = $transaction->id; //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $transaction->t_total_money; // Số tiền thanh toán
            $vnp_Locale = $request->language ?? "vn"; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = $request->bankCode ?? "VNBANK"; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version"    => "2.1.0",
                "vnp_TmnCode"    => $vnp_TmnCode,
                "vnp_Amount"     => $vnp_Amount * 100,
                "vnp_Command"    => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode"   => "VND",
                "vnp_IpAddr"     => $vnp_IpAddr,
                "vnp_Locale"     => $vnp_Locale,
                "vnp_OrderInfo"  => "Thanh toan GD:" . $vnp_TxnRef,
                "vnp_OrderType"  => "other",
                "vnp_ReturnUrl"  => $vnp_Returnurl,
                "vnp_TxnRef"     => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            header('Location: ' . $vnp_Url);
            die();
        }
    }

    public function success(Request $request)
    {
        $transaction = Transaction::find($request->transactionID);
        if (!$transaction) return abort(404);

        return view('frontend.shopping.success', ['transaction' => $transaction]);
    }
}
