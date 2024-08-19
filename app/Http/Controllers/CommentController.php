<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Comment $comment) {
        $this->comment = $comment;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post_id)
    {
        //
        $this->comment->user_id = auth()->id();
        $this->comment->post_id = $post_id;
        $this->comment->body = $request->body;
        $this->comment->save();

        return back();
    }

    public function destroy($id)
    {
        $this->comment->destroy($id);
        return redirect()->back();
    }
}
