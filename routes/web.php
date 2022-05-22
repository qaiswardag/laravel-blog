<?php

use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

// home
Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});


// post
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);

});

// category
Route::get('/categories/{category:slug}', function (Category $category) {
    $posts = Post::all();
    return view('posts', [
        'posts' => $category->posts
    ]);
});


// author
Route::get('/authors/{author:username}', function (User $author) {
    $posts = Post::all();
    return view('posts', [
        'posts' => $author->posts
    ]);
});
