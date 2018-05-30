<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Support\Facades\Session;

class ArticleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($article = Article::where('id', $request->id)->first()) {
            if ($request->user()->name != $article->user->name) {
                Session::flash('result', 'Permission denied');
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
