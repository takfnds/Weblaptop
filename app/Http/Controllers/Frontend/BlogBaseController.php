<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogBaseController extends Controller
{
    public function getMenus()
    {
        $menus = Menu::withCount('articles')
            ->orderByDesc('id')
            ->get();

        return $menus;
    }

    public function getArticlesLatest()
    {
        return Article::orderByDesc('id')
            ->limit(4)
            ->select('id','a_name','a_avatar','a_slug','a_view','created_at')
            ->get();
    }

    public function getTags()
    {
        return Tag::orderByDesc('id')->get();
    }
}
