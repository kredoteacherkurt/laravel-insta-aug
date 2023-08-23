<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowController extends Controller
{

    private $follow;

    public function __construct(Follow $follow){
        $this->follow = $follow;
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->follow->follower_id = Auth::user()->id;
        $this->follow->following_id = $request->user_id;
        $this->follow->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $follow =  $this->follow->follower_id->findOrFail(Auth::user()->id);
        // return view('users.profile.followers')->with('follow', $follow);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $this->follow->where('follower_id', Auth::user()->id)
                     ->where('following_id', $user_id)
                     ->delete();
        
        return redirect()->back();
    }
}
