<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index(Request $request, $slug)
    {
        $keyword = Keyword::where('k_slug', $slug)->first();
        if (!$keyword) return abort(404);

        $products = Product::whereHas('keywords', function ($query) use ($keyword) {
            $query->where('pk_keyword_id', $keyword->id);
        })
            ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar')
            ->paginate(12);

        $viewData = [
            'title'    => $keyword->k_name,
            'keyword'  => $keyword,
            'products' => $products
        ];

        return view('frontend.category.index', $viewData);
    }
}
