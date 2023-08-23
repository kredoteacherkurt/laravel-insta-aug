<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;


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



Route::group(["middleware" => "auth"], function(){

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

   Route::group([ "as" => "admin.", "prefix" => "admin"], function (){
      Route::get('/users', [UsersController::class, 'index'])->name('users');
      Route::delete('/users/{id}', [UsersController::class, 'deactivate'])->name('users.deactivate');
      Route::patch('/users/activate/{id}', [UsersController::class, 'activate'])->name('users.activate');

      Route::get('/posts', [PostsController::class, 'index'])->name('posts');
      Route::delete('/posts/{id}/hide', [PostsController::class, 'hide'])->name('posts.hide');
      Route::patch('/posts/{id}/unhide', [PostsController::class, 'unhide'])->name('posts.unhide');

      Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
      Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
      Route::patch('/categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
      Route::delete('/categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
      Route::get('/categories/{id}/index', [CategoriesContoller::class, 'uncategorized'])->name('categories.uncategorized');
      Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
   });

   
});
