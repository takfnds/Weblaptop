<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendCategoryController extends Controller
{
    protected $folder = 'backend.category.';

    public function index()
    {
        $categories       = Category::with('parent:id,c_name')->orderByDesc('id')->get();
        $categoriesParent = Category::where('c_parent_id', 0)->get();
        $viewData         = [
            'categories'       => $categories,
            'categoriesParent' => $categoriesParent
        ];
        return view($this->folder . 'index', $viewData);
    }


    public function store(BackendCategoryRequest $request)
    {
        $data               = $request->except('_token', 'c_avatar');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();
        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if (isset($image['code'])) {
                $data['c_avatar'] = $image['name'];
            }
        }
        $category = Category::create($data);
        $this->clearCache("CATEGORY_SLUG_". $data['c_slug']);
        return redirect()->back();
    }

    public function edit($id)
    {
        $categories       = Category::with('parent:id,c_name')->orderByDesc('id')->get();
        $category         = Category::find($id);
        $categoriesParent = Category::where('c_parent_id', 0)->get();
        $viewData         = [
            'categories'       => $categories,
            'category'         => $category,
            'categoriesParent' => $categoriesParent
        ];

        return view($this->folder . 'update', $viewData);
    }

    public function update(BackendCategoryRequest $request, $id)
    {
        $data               = $request->except('_token', 'c_avatar');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now();
        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if (isset($image['code'])) {
                $data['c_avatar'] = $image['name'];
            }
        }
        Category::find($id)->update($data);
        $this->clearCache("CATEGORY_SLUG_". $data['c_slug']);
        return redirect()->back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $this->clearCache("CATEGORY_SLUG_". $category->c_slug);
            $category->delete();
        }
        return redirect()->route('get_backend.category.index');
    }

}
