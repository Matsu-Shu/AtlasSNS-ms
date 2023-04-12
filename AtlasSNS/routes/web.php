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

    //profileUpdate
    Route::get('/profile','UsersController@profile');
    Route::post('profile/update','UsersController@profileUpdate');

    //userProfile
    Route::get('/profile/{id}', 'UsersController@userProfile');
    Route::get('profile/follow/{id}', 'UsersController@follow'); //フォローする（テーブルに登録する）
    Route::get('profile/unfollow/{id}', 'UsersController@unfollow'); //フォロー解除する（テーブルから削除する）

    //search
    Route::get('/search','UsersController@search');

    //follow・unfollow
    Route::get('follow/{id}', 'FollowsController@follow'); //フォローする（テーブルに登録する）
    Route::get('unfollow/{id}', 'FollowsController@unfollow'); //フォロー解除する（テーブルから削除する）

    //following・followed　list
    Route::get('/followList','FollowsController@followList');
    Route::get('/followerList','FollowsController@followerList');

    //logout
    Route::get('/logout', 'Auth\LoginController@logout');
});
