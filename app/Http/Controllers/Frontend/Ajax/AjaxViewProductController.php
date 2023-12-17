<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxViewProductController extends Controller
{
    public function getPreviewProduct(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::find($id);
            if (!$product) return response()->json([
                'status' => 404
            ]);

            $html = view('frontend.components._inc_preview_product',['product' => $product])->render();
            return response()->json([
                'status' => 200,
                'html'   => $html
            ]);
        }

    }
}
