<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail(AUth::user()->id);

        return view('users.profile.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|min:1|max:50',
        //     'email' => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
        //     'avatar' => 'required|mimes:jpg,gif,png,jpeg|max:1024',
        //     'introduction' => 'required|min:1|max:1000'
        // ]);

        $user = $this->user->findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        if($request->avatar){
            $user->avatar = 'data:image/' . $request->avatar->extension() . ';base64,' . base64_encode(file_get_contents($request->avatar));
            }
        
        $user->save();

        return redirect()->route('profile.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function followers($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.followers')->with('user', $user);
    }

    public function following($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.followings')->with('user', $user);
    }
}
