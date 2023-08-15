<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    private $post;
    private $category;

    public function __construct(Post $post,Category $category){
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_categories = $this->category->all();

       

        return view('users.post.create')->with('all_categories', $all_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'category' => 'required|min:1',
        //     'description' => 'required|min:1|max:1000',
        //     'image' => 'required|mimes:jpg,gif,png,jpeg|max:1024'
        // ]);

        $this->post->user_id = Auth::user()->id;
        $this->post->description = $request->description;
        // $this->post->image = $this->saveImage($request);
        $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        //converting an uploaded image into textand saving to database(it saves to database directly)
        $this->post->save();

       // converting index array from form into associative array
        foreach($request->category as $category_id):
            $category_post[] = ["category_id" => $category_id];

         endforeach;

       $this->post->categoryPost()->createMany($category_post);

       return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('users.post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $all_categories = $this->category->all();
        $post = $this->post->findOrFail($id);
        $selected_categories = [];

        foreach($post->categoryPost as $category_post):
                $selected_categories[] = $category_post->category_id;
        endforeach;


        return view('users.post.edit')
                 ->with('post', $post)
                 ->with('all_categories', $all_categories)
                 ->with('selected_categories', $selected_categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'category' => 'required|min:1',
        //     'description' => 'required|min:1|max:1000',
        //     'image' => 'required|mimes:jpg,gif,png,jpeg|max:1024'
        // ]);

        $post = $this->post->findOrFail($id);
        $post->description = $request->description;

        //if the user wants to update teh image
        if($request->image){
        $post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }

        $post->save();

        //delete old categories
        $post->categoryPost()->delete();

        //proccess new categories and save
        foreach($request->category as $category_id):
            $category_post[] = ["category_id" => $category_id];
         endforeach;

       $post->categoryPost()->createMany($category_post);

       return redirect()->route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail($id)->delete();

        return redirect()->back();
    }
}
