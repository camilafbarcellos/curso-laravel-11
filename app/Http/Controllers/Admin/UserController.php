<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // returns a view with the first user
    public function index() {
        $user = User::first();

        return view('admin.users.index', compact('user'));
    }
}
