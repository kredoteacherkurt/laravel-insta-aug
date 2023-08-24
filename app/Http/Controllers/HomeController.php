<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $all_posts = $this->getHomePosts();
        $suggested_users = $this->getSuggestedUsers();
        // $all_categories = Category::latest()->get();
        // return view('users.home')->with('all_posts', $all_posts);

        $home_posts = $this->getHomePosts();
        
        $searchUser = $request->input('searchUser');

        $query = User::query();

        if(!empty($searchUser)){
            $query->where('name', 'LIKE', "%{$searchUser}%");
        }

        $users = $query->get();
        

        return view('users.home')
                   ->with('home_posts', $all_posts)
                   ->with('suggested_users', $suggested_users)
                   ->with('searchUser', $searchUser);
    }

    # GET THE POSTS of the users that the logged-in user id following
    private function getHomePosts(){
        $all_posts = Post::all();
        $home_posts = [];  //if you don't declare the $home_posts as an empty array, it will return NULL.

        foreach($all_posts as $post){
            if($post->user->isFollowed() || $post->user->id === Auth::user()->id){
                $home_posts[] = $post;
            }
        }

        return $home_posts;
    }

    public function getSuggestedUsers(){
        $all_users = User::all()->except(Auth::user()->id);
        $suggested_users = [];
        foreach($all_users as $user):
            if(!$user->isFollowed()){
                $suggested_users [] = $user;
            }
        endforeach;

        return $suggested_users;

    }


}
