<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController; //投稿機能

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
    return view('home');
    //return view('welcome');
});

//Sass(デザイン)
URL::forceScheme('https');

//トップページ
Route::get('home',[\App\Http\Controllers\HomeController::class, 'home']);
//ユーザー
Auth::routes();
//サインアップ・ログイン後の遷移
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//投稿
Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

//投稿を押した時
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
