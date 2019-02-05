<?php


Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => ['auth']
    ],
    function () {
        Route::get('/', 'DashboardController@dashboard')
            ->name('admin.index');
        Route::resource('/category', 'CategoryController', ['as' => 'admin']);
        Route::resource('/article', 'ArticleController', ['as' => 'admin']);
        Route::resource('/image', 'ImageController', ['as' => 'admin']);

        Route::get('/load', function () {
            return view('admin.image.add');
        });
        Route::post('/image/upload','ImageController@upload')->name('image.upload');
        

    });


Route::get('/', function () {
    return view('blog.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
