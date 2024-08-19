<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;



Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::group(['prefix'=>'post', 'as'=>'post.'], function(){
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('store', [PostController::class, 'store'])->name('store');
        Route::get('show/{id}', [PostController::class, 'show'])->name('show');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix'=>'comment', 'as'=>'comment.'], function(){
        Route::post('store/{post_id}', [CommentController::class, 'store'])->name('store');
        Route::delete('destroy/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
        Route::get('/show/{user_id}',[ProfileController::class,'show'])->name('show');
        Route::get('/edit/{user_id}',[ProfileController::class,'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class,'update'])->name('update');

    });

    Route::group(['prefix'=>'like'], function(){
        Route::post('store/{post_id}', [LikeController::class, 'store'])->name('like');
        // Route::delete('destroy/{post_id}', [CommentController::class, 'destroy'])->name('unlike');
    });



});
