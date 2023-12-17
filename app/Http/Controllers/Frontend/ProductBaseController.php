<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductBaseController extends BaseFrontendController
{
    public function getCategoriesSort()
    {
        return Category::with('childs:id,c_name,c_slug,c_parent_id')
            ->where('c_parent_id',0)
            ->get();
    }
}
