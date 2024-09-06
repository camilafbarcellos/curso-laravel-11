<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // returns a view with all users
    public function index()
    {
        // $users = User::all(); // without pagination
        $users = User::paginate(20); // with pagination (default: 15)

        return view('admin.users.index', compact('users'));
    }

    // returns the create new user view
    public function create()
    {
        return view('admin.users.create');
    }

    // creates a new user
    public function store(Request $request)
    {
        // creates with all the data from the request
        User::create($request->all());

        // redirects to the users index
        return redirect()->route('users.index');
    }
}
