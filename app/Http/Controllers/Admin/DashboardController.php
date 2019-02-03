<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard',[
            'categories'=>Category::LastCategories(6),
            'articles' => Article::LastArticles(6),
            'count_categories' => Category::count(),
            'count_articles'=>Article::count()
        ]);
    }
}
