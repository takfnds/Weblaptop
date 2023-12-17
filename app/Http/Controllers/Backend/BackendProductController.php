<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendProductController extends Controller
{
    protected $folder = 'backend.product.';

    public function index()
    {
        $products = Product::with('category:id,c_name')->orderByDesc('id')
            ->get();

        $viewData = [
            'products' => $products
        ];

        return view($this->folder . 'index', $viewData);
    }

    public function create()
    {
        $categories    = Category::all();
        $keywords      = Keyword::all();
        $manufacturers = Manufacturer::orderByDesc('id')->get();
        $viewData      = [
            'categories'    => $categories,
            'keywordOld'    => [],
            'manufacturers' => $manufacturers,
            'keywords'      => $keywords
        ];

        return view($this->folder . 'create', $viewData);
    }

    public function store(BackendProductRequest $request)
    {
        $data               = $request->except('_token', 'pro_avatar', 'keywords', 'file');
        $data['pro_slug']   = Str::slug($request->pro_name);
        $data['created_at'] = Carbon::now();
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if (isset($image['code'])) {
                $data['pro_avatar'] = $image['name'];
            }
        }

        $data['pro_configuration'] = json_encode($request->pro_configuration);

        $product = Product::create($data);
        $this->clearCache('PRODUCT_HOT');
        $this->clearCache('PRODUCT_NEWS');
        if ($request->keywords)
            $this->syncKeyword($request->keywords, $product->id);
        if ($request->file) {
            $this->syncAlbumImageAndProduct($request->file, $product->id);
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $categories    = Category::all();
        $product       = Product::find($id);
        $keywords      = Keyword::all();
        $manufacturers = Manufacturer::orderByDesc('id')->get();
        $keywordOld    = \DB::table('products_keywords')
                ->where('pk_product_id', $id)->pluck('pk_keyword_id')->toArray() ?? [];

        $images = ProductImage::where("pi_product_id", $id)
            ->get();

        $viewData = [
            'keywords'      => $keywords,
            'keywordOld'    => $keywordOld,
            'product'       => $product,
            'manufacturers' => $manufacturers,
            'images'        => $images,
            'categories'    => $categories
        ];

        return view($this->folder . 'update', $viewData);
    }

    public function syncKeyword($keywords, $productID)
    {
        if (!empty($keywords)) {
            $datas = [];
            foreach ($keywords as $keyword) {
                $datas[] = [
                    'pk_product_id' => $productID,
                    'pk_keyword_id' => $keyword
                ];
            }
            \DB::table('products_keywords')->where('pk_product_id', $productID)->delete();
            \DB::table('products_keywords')->insert($datas);
        }
    }

    public function update(BackendProductRequest $request, $id)
    {
        $data               = $request->except('_token', 'pro_avatar', 'keywords', 'file');
        $data['pro_slug']   = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if (isset($image['code'])) {
                $data['pro_avatar'] = $image['name'];
            }
        }
        $data['pro_configuration'] = json_encode($request->pro_configuration);
        Product::find($id)->update($data);
        $this->clearCache('PRODUCT_HOT');
        $this->clearCache('PRODUCT_NEWS');
        $this->clearCache('PRODUCT_DETAIL_'. $data['pro_slug']);
        if ($request->keywords)
            $this->syncKeyword($request->keywords, $id);

        if ($request->file) {
            $this->syncAlbumImageAndProduct($request->file, $id);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product)
        {
            if ($product->pro_hot)  $this->clearCache('PRODUCT_HOT');
            $this->clearCache('PRODUCT_DETAIL_'. $product->c_slug);
            $this->clearCache('PRODUCT_NEWS');
            $product->delete();

        }
        return redirect()->back();
    }

    public function syncAlbumImageAndProduct($files, $productID)
    {
        foreach ($files as $key => $fileImage) {
            $ext    = $fileImage->getClientOriginalExtension();
            $extend = [
                'png', 'jpg', 'jpeg', 'PNG', 'JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__') . Str::slug($fileImage->getClientOriginalName()) . '.' . $ext;
            $path     = public_path() . '/uploads/' . date('Y/m/d/');
            if (!\File::exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileImage->move($path, $filename);
            \DB::table('products_images')
                ->insert([
                    'pi_name'       => $fileImage->getClientOriginalName(),
                    'pi_slug'       => $filename,
                    'pi_product_id' => $productID,
                    'created_at'    => Carbon::now()
                ]);
        }
    }

    public function deleteImage($imageID)
    {
        ProductImage::where('id', $imageID)->delete();
        return redirect()->back();
    }
}
