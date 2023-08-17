<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::group(["middleware" => "auth"], function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    //    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    //    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    //    Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('post.show');

    Route::resource('/post', PostController::class);

    Route::resource('/comment', CommentController::class);

    Route::resource('/like', LikeController::class);

    Route::resource('/profile', ProfileController::class);

    Route::resource('/follow', FollowController::class);

    Route::get('/followers/{id}/show', [ProfileController::class, 'followers'])->name('follower.show');
    Route::get('/following/{id}/show', [ProfileController::class, 'following'])->name('following.show');

    Route::group(["as"=>"admin.","prefix"=>"admin"], function () {
        Route::get('/users',[UsersController::class,'index'])->name('users');
        Route::delete('/users/{id}',[UsersController::class,'deactivate'])->name('users.deactivate');
    });
});
