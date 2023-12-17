<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends BlogBaseController
{
    public function index()
    {
        // Bài viêt mới nhất
        $articles = Article::with('menu:id,mn_name,mn_slug')->orderByDesc('id')
            ->paginate(6);

        $menus    = $this->getMenus();

        $viewData = [
            'articles'       => $articles,
            'articlesLatest' => $this->getArticlesLatest(),
            'tags'           => $this->getTags(),
            'menus'          => $menus
        ];

        return view('frontend.menu.index', $viewData);
    }

    public function search(Request $request)
    {
        $k = $request->k;
        $articles = Article::with('menu:id,mn_name,mn_slug')
            ->where('a_name','like','%'.$k.'%')
            ->orderByDesc('id')
            ->paginate(10);
        $menus    = $this->getMenus();

        $viewData = [
            'articles'       => $articles,
            'articlesLatest' => $this->getArticlesLatest(),
            'tags'           => $this->getTags(),
            'menus'          => $menus
        ];

        return view('frontend.menu.index', $viewData);
    }
}
