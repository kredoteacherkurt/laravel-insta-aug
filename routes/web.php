<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
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
        Route::delete('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');    });

    Route::group(['prefix'=>'comment', 'as'=>'comment.'], function(){
        Route::post('store/{post_id}', [CommentController::class, 'store'])->name('store');
        Route::delete('destroy/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
        Route::get('/show/{user_id}',[ProfileController::class,'show'])->name('show');
        Route::get('/edit/{user_id}',[ProfileController::class,'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class,'update'])->name('update');
        Route::get('/followers/{user_id}',[ProfileController::class,'followers'])->name('followers');

    });

    Route::group(['prefix'=>'like'], function(){
        Route::post('store/{post_id}', [LikeController::class, 'store'])->name('like');
        // Route::delete('destroy/{post_id}', [CommentController::class, 'destroy'])->name('unlike');
    });

    Route::group(['prefix'=>'follow',"as"=>"follow."], function(){
        Route::post('follow/{following_id}', [FollowController::class, 'store'])->name('store');
        Route::delete('follow/{following_id}', [FollowController::class, 'destroy'])->name('destroy');
    });

    Route::group(["prefix"=>"admin","as"=>"admin."],function(){
        Route::group(["prefix"=>"users","as"=>"users."], function(){
            Route::get('/index',[UsersController::class,'index'])->name('index');
            Route::delete('/{id}/deactivate',[UsersController::class,'deactivate'])->name('deactivate');
            Route::patch('/{id}/activate',[UsersController::class,'activate'])->name('activate');
        });

        Route::group(["prefix"=>"posts","as"=>"posts."], function(){
            Route::get('/index',[PostsController::class,'index'])->name('index');
            Route::delete('/{id}/hide',[PostsController::class,'hide'])->name('hide');
            Route::patch('/{id}/unhide',[PostsController::class,'unhide'])->name('unhide');
        });



    });



});
