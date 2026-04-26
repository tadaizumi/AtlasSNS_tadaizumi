<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function() {
  Route::get('top', [PostsController::class, 'index'])->name('top');

  Route::get('profile', [ProfileController::class, 'profile']);
  Route::post('profile', [ProfileController::class, 'profile'])->name('profile');

  //プロフィール編集
  // Route::post('/book/update',[BooksController::class, 'update']);
  // Route::put('/profile', 'UserController@profileUpdate')->name('profile_edit');
  Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile_edit');


  Route::get('search', [UsersController::class, 'search'])->name('search');

  Route::get('follow-list', [FollowsController::class, 'followList']);
  Route::get('follower-list', [FollowsController::class, 'followerList']);

  //↓クリックしたアイコンのユーザーページに遷移
  Route::get('profile/{id}/show', [ProfileController::class, 'show'])->name('user.show');

  Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

  Route::post('post/create', [PostsController::class, 'postCreate']);

  Route::post('/post/update',[PostsController::class, 'postUpdate']);

  // Route::get('post/delete',[PostsController::class, 'delete']);
  Route::get('/post/{id}/delete',[PostsController::class, 'postDelete']); //deleteメソッドを使用するためのルーティング

  Route::get('/user/{id}/follow',[UsersController::class,'follow'])->name('follow'); //フォロー

  Route::get('/user/{id}/unfollow',[UsersController::class,'unfollow'])->name('unfollow'); //フォロー解除

});
