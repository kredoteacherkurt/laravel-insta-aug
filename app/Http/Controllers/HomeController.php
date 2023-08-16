<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_posts = Post::latest()->get();
        $suggested_users = $this->getSuggestedUsers();
        // $all_categories = Category::latest()->get();
        // return view('users.home')->with('all_posts', $all_posts);

        $home_posts = $this->getHomePosts();
        return view('users.home')
                    ->with('home_posts', $all_posts)
                    ->with('suggested_users', $suggested_users);
    }

    # GET THE POSTS of the users that the logged-in user is following
    private function getHomePosts()
    {
        $all_posts = Post::latest()->get();
        $home_posts = []; //if you dont declare the $home_posts as an empty array, it will return NULL.

        foreach($all_posts as $post){
            if($post->user->isFollowed() || $post->user->id === Auth::user()->id){
                $home_posts[] = $post;
            }
        }

        return $home_posts;
    }
    public function getSuggestedUsers(){
        //1. create a new method inside home contnroller
        //2. pass the data to home.blade.php
        // gets the users you dont follow

        $all_users = User::all()->except(Auth::user()->id);
        $suggested_users = [];
        foreach($all_users as $user):
            if (!$user->isFollowed()) {
                $suggested_users [] = $user;
            }
        endforeach;

        return $suggested_users;
    }
}
