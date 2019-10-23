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

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function (){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::post('/post', 'PostController@store')->name('post.create');
Route::post('/comments/{id}', 'CommentController@store')->name('comment.create');
Route::post('/comments/reply/{id}', 'CommentController@reply')->name('comment.reply');
Route::get('/like_post/{id}', 'LikeController@likePost')->name('like.post');
Route::get('/unlike_post/{id}', 'LikeController@unlikePost')->name('unlike.post');
Route::get('/follow/{id}', 'UserController@follow')->name('follow');
Route::get('/unfollow/{id}', 'UserController@unfollow')->name('unfollow');
Route::get('/posts', 'PostController@fetchPosts')->name('posts.fetch');
Route::get('/post-likes-count/{post_id}', 'PostController@postLikesCount')->name('likes.count');
Route::get('/markAsRead', function(){
    Auth::user()->unreadNotifications->markAsRead();
});

Route::get('/messages', 'MessagesController@index')->name('message.index');
Route::post('/message/{message_to}', 'MessagesController@store')->name('message.create');