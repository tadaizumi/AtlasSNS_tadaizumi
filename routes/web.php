<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
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
  Route::get('top', [PostsController::class, 'index']);

  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'search']);

  Route::get('follow-list', [PostsController::class, 'index']);
  Route::get('follower-list', [PostsController::class, 'index']);

  Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

  Route::post('post/create', [PostsController::class, 'postCreate']);

  Route::post('/post/update',[PostsController::class, 'postUpdate']);

  // Route::get('post/delete',[PostsController::class, 'delete']);
  Route::get('/post/{id}/delete',[PostsController::class, 'postDelete']); //deleteメソッドを使用するためのルーティング
});
