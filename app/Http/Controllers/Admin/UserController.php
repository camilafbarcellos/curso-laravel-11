<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // creates a new user with our own request class
    public function store(StoreUserRequest $request)
    {
        // creates with the validated data from the request
        User::create($request->validated());

        // redirects to the users index with a session message of success
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    // returns the edit user view with the user data
    public function edit(string $id)
    {
        // $user = User::where('id', '=', $id)->first(); // the '=' is default
        // $user = User::where('id', $id)->firstOrFail(); // returns 404 when not found (perfect for APIs)
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    // updates a user our own request class
    public function update(UpdateUserRequest $request, string $id)
    {
        if(!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');

        // checks if the password is filled and encrypts it
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        // updates the user
        $user->update($data);

        // redirects to the users index with a session message of success
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário editado com sucesso!');
    }

    // shows details of a user
    public function show(string $id)
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.show', compact('user'));
    }

    // destroys a user
    public function destroy(string $id)
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        // prevents users from deleting themselves
        if(Auth::user()->id === $user->id) {
            return back()->with('message', 'Não é permitido excluir o seu próprio usuário!');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
