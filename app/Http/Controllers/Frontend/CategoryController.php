<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends ProductBaseController
{
    public function index(Request $request, $slug =  null)
    {
        if ($slug)
        {
            $category = Cache::remember('CATEGORY_SLUG_'. $slug, 60 * 10, function () use ($slug){
                return Category::where('c_slug', $slug)->first();
            });

            if (!$category) return abort(404);
        }

        $products = Product::whereRaw(1);

        if (isset($category))
        {
            $products->where('pro_category_id', $category->id);
        }

        if ($name = $request->k) {
            $products->where('pro_name', 'like', '%' . $name . '%');
        }

        if($price = $request->price) {
            $configExtractPrice = config('setting.filter.price_extract');
            if (array_key_exists($price, $configExtractPrice))
            {
                $products->where('pro_price','>=', $configExtractPrice[$price][0] * 1000000)
                    ->where('pro_price','<', $configExtractPrice[$price][1] * 1000000);
            }
        }

        if($request->m)
            $products->where('pro_manufacturer_id', $request->m);

        if($sort = $request->sorting)             $products->orderBy("id",$sort);

        $products = $products->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar')
            ->paginate(15);

        $viewData = [
            'title'          => $category->c_name ?? "Sản phẩm",
            'category'       => $category ?? null,
            'query'          => $request->query(),
            'categoriesSort' => $this->getCategoriesSort(),
            'products'       => $products,
        ];
        if ($request->ajax()) {
            $html = view('frontend.category.include._inc_products', $viewData)->render();
            return  response()->json([
                'html' => $html,
                'url_full' => $request->fullUrl()
            ]);
        }

        return view('frontend.category.index', $viewData);
    }
}
