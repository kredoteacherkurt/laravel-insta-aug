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

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $all_posts = Post::query()
            ->where('description', 'LIKE', "%$search%")
            ->orWhereHas('categoryPost.category', function($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10); // 10件ずつページネーション

        return view('admin.posts.index', compact('all_posts'));
    }



}
