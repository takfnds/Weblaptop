<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxEmailController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax())
        {
            $message = 'Lưu dữ liệu thành công';
            if($request->email)
            {
                DB::table('emails')->insert([
                    'email' => $request->email,
                    'created_at' => Carbon::now()
                ]);
            }else{
                $message = "Thêm dữ liệu thất bại";
            }

           return response()->json([
               'status' => 200,
               'message' => $message
           ]);
        }
    }
}
