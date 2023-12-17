<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // SP HÓT
        $productsHot = Cache::remember('PRODUCT_HOT', 60 * 10, function () {
            return Product::where('pro_hot', Product::HOT)
                ->limit(10)
                ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar', 'pro_sale')
                ->get();
        });

        // SP mới
        $productsNews = Cache::remember('PRODUCT_NEWS', 60 * 10, function () {
            return Product::orderByDesc('id')->limit(5)
                ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar', 'pro_sale')
                ->get();
        });

        // hãng sản phẩm
        $manufacturers = Cache::remember('MANUFACTURERS_ALL', 60 * 60, function () {
            return Manufacturer::all();
        });

        // Slide
        $slides = Cache::remember('SLIDE_HOME', 60 * 60, function () {
            return Slide::get();
        });

        $viewData = [
            'slides'        => $slides,
            'productsHot'   => $productsHot,
            'productsNews'  => $productsNews,
            'manufacturers' => $manufacturers
        ];

        return view('frontend.home.index', $viewData);
    }
}
