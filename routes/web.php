<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::group(['prefix'=>'post', 'as'=>'post.'], function(){
        Route::get('create', [App\Http\Controllers\PostController::class, 'create'])->name('create');
    });
});
