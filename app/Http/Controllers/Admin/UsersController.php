<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    
    public function index(){
        $all_users = User::withTrashed()->latest()->get();

        return view('admin.users.index')->with('all_users', $all_users);
    }

    public function deactivate($id){
        User::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function activate($id){
        User::withTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    // UserController.php

// UsersController.php

public function search(Request $request)
{
    $search = $request->input('search');
    
    $all_users = User::withTrashed()
        ->where('name', 'LIKE', "%$search%")
        ->orWhere('email', 'LIKE', "%$search%")
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.users.index', compact('all_users'));
}



}
