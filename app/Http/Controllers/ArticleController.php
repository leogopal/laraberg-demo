<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function __construct()
    {   $this->errors = new MessageBag();
        $this->middleware(function($request, $next) {
            $this->article = Article::find($request->route('article'));
            if (!$this->article) return abort(404);
            return $next($request);
        })->only(['show', 'edit', 'update', 'destroy']);
        $this->middleware(function($request, $next) {
            $this->validator = $this->runValidation($request);
            return $next($request);
        })->only(['store', 'update']);
    }

    public function home() {
        $articles = Article::orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();

        return view('articles/home', [ 'articles' => $articles, 'articleCount' => Article::count() ]);
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
                            ->paginate(20);

        return view('articles/index', [ 'articles' => $articles ]);
    }

    public function create()
    {
        return view('articles/create');
    }

    public function destroy(Request $request, $id)
    {
        $this->article->delete();
        return redirect()->route('articles.index')->withErrors($this->errors);
    }

    public function edit(Request $request, $id)
    {
        return view('articles/edit', ['article' => $this->article]);
    }

    public function store(Request $request) {
        $article = new Article;
        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->save();
        $article->setContent($request->content, true);
        return redirect()->route('articles.show', $article);
    }

    public function show(Request $request, $id)
    {
        return view('articles/show', ['article' => $this->article]);
    }

    public function update(Request $request, $id)
    {
        $this->article->title = $request->title;
        $this->article->setContent($request->content, true);
        $this->article->save();
        return redirect()->route('articles.show', $this->article);
    }

    public function runValidation($request)
    {
        return $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
    }
}
