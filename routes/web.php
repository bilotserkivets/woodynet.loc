<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

// Адмінка блогу
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];

Route::group($groupData, function() {
    //BlogCategory
    $method = ['index', 'edit', 'update', 'create', 'store', 'destroy'];
    Route::resource('categories', 'CategoryController')
            ->only($method)
            ->names('blog.admin.categories');
    
    //BlogPost
    Route::resource('posts', 'PostController')
            ->except('show')
            ->names('blog.admin.posts');
});

Route::resource('/', 'Blog\IndexController', [
                                            'only' => 'index',
                                            'names' => [
                                                'index' => 'home',
                                            ]
]);

Route::get('/posts/{slug}', 'Blog\PostController@show')->name('posts.show');

Route::resource('blog/posts', 'Blog\PostController', [
                                            'parametres' => [
                                              'articles' => 'alias',
                                            ]
    
]);