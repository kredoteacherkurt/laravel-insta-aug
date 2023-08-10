<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;

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



Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('/post',PostController::class);
    Route::resource('/comment', CommentController::class);
    Route::resource('/like',LikeController::class);

});
