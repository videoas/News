<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Image;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
    //     $stale_posts = Article::where('updated_at', '<', Carbon::now()->subDays(7))->get();
    //     foreach ($stale_posts as $post) {
    //         $post->delete();

    //     }
    //    $stale_posts = Image::where('updated_at', '<', Carbon::now()->subDays(7))->get();
    //     foreach ($stale_posts as $post) {
    //         $post->delete();
    //     }
        return view('admin.dashboard',[
            'categories'=>Category::LastCategories(6),
            'articles' => Article::LastArticles(6),
            'count_categories' => Category::count(),
            'count_articles'=>Article::count()
        ]);
    }
}
