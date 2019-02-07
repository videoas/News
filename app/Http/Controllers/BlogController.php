<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Image;
use DB;

use App\Events\PostHasViewed;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
          $articles = Article::where('published', 1)->paginate(15);
        //  foreach ($articles as $article) {

        //      dd($article->categories()->first()->id);

        //    //  dd($article);
       

        //  }
        return view('blog.home', [
          
            'articles' => $articles
        ]);
    }


    public function category($slug)
    {

        $category = Category::where('slug', $slug)->first();

         $articles = $category->articles()->where('published', 1)->get();
        //  foreach ($articles as $article) {

        //      dd($article->categories()->first()->id);

        //    //  dd($article);
       
        //  }
        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(12)
        ]);
    }

    public function article($slug)
    { 
        $article = Article::where('slug', $slug)->first();

        $article->increment('viewed');
              
      
      
        
        return view('blog.article',
            compact('article'));
    }
}