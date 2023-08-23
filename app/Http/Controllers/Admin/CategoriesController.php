<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post){
        $this->category = $category;
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_categories = Category::latest()->get();

        // get all post
        $all_posts = Post::latest()->get();
       
        $uncategorized = 0;
        // use foreach loop and if statement
         // check if post has categories
        foreach($all_posts as $post):
            if($post->categoryPost->count() == 0){
                $uncategorized++;
            }
        endforeach;

       
        return view('admin.categories.index')->with('all_categories', $all_categories)
        ->with('uncategorized',$uncategorized);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->name = $request->name;
        $this->category->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = $this->category->findOrFail($id);
        $category->name = $request->name;
        $category->updated_at = $request->updated_at;
        $category->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->category->findOrFail($id)->delete();

        return redirect()->back();

        
    }

    // public function uncategorized(){
    //     $uncategorized = Categories::whereNull('category_id')->count();

    //     return redirect()->back();
    // }
}
