<?php

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
/*Route::get('/posts/{post}', function ($post) {
    $posts = [
        'test' => 'test blogging 1',
        'qwerty' => 'test blog 2'
    ];

    if (!array_key_exists($post, $posts)){
        abort(404, 'Post not found');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)){
        return redirect("/");
    }

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z]+');