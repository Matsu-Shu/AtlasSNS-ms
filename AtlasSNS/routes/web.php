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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のミドルウェア
// Route::middleware(['guest'])->group(function () {
   //ログアウト中のページ
  Route::get('/login', 'Auth\LoginController@login');
  Route::post('/login', 'Auth\LoginController@login');

  Route::get('/register', 'Auth\RegisterController@register');
  Route::post('/register', 'Auth\RegisterController@register');

  Route::get('/added', 'Auth\RegisterController@added');
  Route::post('/added', 'Auth\RegisterController@added');

// });



//ログイン中のミドルウェア
Route::group(['middleware' => ['auth']],function (){
    //ログイン中のページ
    Route::get('/top','PostsController@index');
    // new Post
    Route::post('post/create','PostsController@create'); // ①つぶやきの登録処理
    Route::post('post/index','PostsController@index');  // ②投稿を表示する

    // update
    Route::post('post/update', 'PostsController@update');

    // delete
    Route::get('post/{id}/delete', 'PostsController@delete');

    //profile
    Route::get('/profile','UsersController@profile');
    Route::post('profile/update','UsersController@profileUpdate');

    //search
    Route::get('/search','UsersController@search');

    //follow
    // Route::get('/follow-list','PostsController@index');
    // Route::get('/follower-list','PostsController@index');
    Route::post('/users/{user}/follow', 'FollowUserController@follow');
    Route::post('/users/{user}/unfollow', 'FollowUserController@unfollow');

    //logout
    Route::get('/logout', 'Auth\LoginController@logout');
});
