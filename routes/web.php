<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //投稿機能
use App\Http\Controllers\RoomController; 
use App\Models\Post; //投稿一覧表示
use App\Models\Room;

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

Route::get('/', function () {
    $posts = Post::orderBy('id', 'desc')->get();
    $user = Auth::user();
    return view('home', compact('posts', 'user'));
    //return view('welcome');
});

//Sass(デザイン)
URL::forceScheme('https');

//トップページ
//ユーザー
Auth::routes();
Route::resource('user', App\Http\Controllers\UserController::class);
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']); //ユーザー編集
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update']); //ユーザーUPDATE

//サインアップ・ログイン後の遷移
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//投稿
Route::resource('post', App\Http\Controllers\PostController::class);
//Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

//投稿を押した時
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

//DM部屋
Route::resource('room', App\Http\Controllers\RoomController::class);
Route::post('/rooms', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
Route::post('/room', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
Route::get('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'show'])->name('room.show');

//DMメッセージ
Route::resource('message', App\Http\Controllers\MessageController::class);
Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');

