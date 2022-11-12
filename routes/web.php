<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialAuthController;
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
    return view('welcome');
});
/*
    Important
*/
Route::resource('posts', PostController::class)->middleware('auth');

Route::post('comments/{postid}', [CommentController::class,'store'])->name('comments.store')->middleware('auth');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/auth/redirect',[SocialAuthController::class,'githubRedirect'])->name('auth.github');

Route::get('/auth/google/redirect',[SocialAuthController::class,'googleRedirect'])->name('auth.google');

Route::get('/auth/callback', [SocialAuthController::class, 'githubCallback']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback']);

