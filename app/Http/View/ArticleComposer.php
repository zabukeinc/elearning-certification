<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Article;

class ArticleComposer
{
    public function compose(View $view)
    {
        $article = Article::orderBy("created_at", "desc")->get();

        $view->with('article',$article);
    }
}