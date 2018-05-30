<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @var Article
     */
    private $article;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Request
     */
    private $request;


    /**
     * BlogController constructor.
     * @param User $user
     * @param Article $article
     * @param Request $request
     */
    public function __construct(User $user, Article $article,Request $request)
    {
        $this->article = $article;
        $this->user = $user;
        $this->request = $request;
    }

    public function viewArticles()
    {
        $articleData = $this->article->all();
        return view('articles')->with(['articleData' => $articleData]);
    }

    public function viewCreate()
    {
        return view('createArticle');
    }

    public function createArticle()
    {
        $title = $this->request->input('title');
        $content = $this->request->input('content');
        $this->article->create(['title' => $title, 'user_id' => $this->request->user()->id, 'content' => $content]);
        session()->flash('result', 'Article added');
        return redirect()->back();
    }

    public function editArticle($id)
    {
        $title = $this->request->input('title');
        $content = $this->request->input('content');
        $this->article->where('id', $id)->update(['title' => $title, 'content' => $content]);
        session()->flash('result', 'article changed');
        return redirect()->back();
    }

    public function viewEdit($id)
    {
        $articleData = Article::where('id', '=', $id)->first();
        if (!$articleData) {
            return view('errors.503');
        } else {
            return view('editArticle')->with(['articleData' => $articleData, 'id' => $id]);
        }
    }

    public function deleteArticle($id)
    {
        $this->article->where('id', $id)->delete();
        return redirect()->to('/articles');
    }

    public function articleById($id)
    {
        $articleData = Article::where('id', '=', $id)->first();
        if (!$articleData) {
            return view('errors.503');
        } else {
            return view('article')->with(['articleData' => $articleData]);
        }
    }

    public function request($id)
    {
        $this->user->where('registration_code', '=', $id)->update(['registration_code' => null]);
        return redirect()->to('/login');
    }
}
