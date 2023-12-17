<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $article = Article::with('tags')->where('a_slug', $slug)->first();
        if (!$article) return abort(404);
        $articleNext = Article::where('id','>',$article->id)->limit(1)->orderBy('id','asc')->first();
        $articlePrev = Article::where('id','<',$article->id)->limit(1)->orderBy('id','desc')->first();
        $this->countView('articles', 'a_view', 'ARTICLE', $article->id);
        $viewData    = [
            'article'        => $article,
            'tags'           => $this->getTags(),
            'articleNext'    => $articleNext,
            'articlePrev'    => $articlePrev,
            'articlesLatest' => $this->getArticlesLatest(),
            'menus'          => $this->getMenus()
        ];

        return view('frontend.article_detail.index', $viewData);
    }

    public function countView($table, $column, $key, $id)
    {
        $ipAddress = get_client_ip();
        $timeNow   = time();
        // Let the views expire after one hour.
        $throttleTime = 60 * 60;
        $key          = $key .'_'. md5($ipAddress) . '_' . $id;
        if (\Session::exists($key)) {
            $timeBefore = \Session::get($key);
            if ($timeBefore + $throttleTime > $timeNow) {
                return false;
            }
        }
        \Session::put($key, $timeNow);

        \DB::table($table)->where('id', $id)
            ->increment($column);
    }
}
