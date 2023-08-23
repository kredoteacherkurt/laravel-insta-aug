<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index(){
        $all_posts = Post::withTrashed()->latest()->paginate(10);

        return view('admin.posts.index')->with('all_posts', $all_posts);
    }

    public function hide($id){
        Post::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function unhide($id){
        Post::onlyTrashed()->findOrFail($id)->restore();

    }

}
