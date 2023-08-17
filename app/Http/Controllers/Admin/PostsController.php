<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    //
    public function index(){
        $all_posts = Post::latest()->get();

        return view('admin.posts.index')->with('all_posts', $all_posts);
    }
}
