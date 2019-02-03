<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
  
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

  
    public function create()
    {
        return view('admin.articles.create', [
            'article' => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

  
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        // Categories
        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    public function show(Article $article)
    {
        //
    }

   
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

  
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));

        // Categories
        $article->categories()->detach();
        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');
    }
}