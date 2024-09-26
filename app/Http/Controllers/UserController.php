<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with([
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->only('name', 'username', 'email',) + [
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        return view('users.show')->with([
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with([
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only('name', 'username', 'email');

        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')->with('error', 'No puedes eliminarte a ti mismo');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
}
