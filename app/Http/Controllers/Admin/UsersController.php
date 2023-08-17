<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function index(){
        $all_users = User::all();

        return view('admin.users.index')->with('all_users', $all_users);
    }
}
