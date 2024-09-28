<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user-index'), 403);

        return view('users.index')->with([
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('user-create'), 403);

        return view('users.create')->with([
            'roles' => Role::all()->pluck('name', 'id'),
            'permissions' => Permission::all()->pluck('name', 'id'),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->only('name', 'username', 'email',) + [
            'password' => bcrypt($request->input('password'))
        ]);

        $roles = Role::whereIn('id', $request->input('roles', []))->pluck('name')->toArray();
        $permissions = Permission::whereIn('id', $request->input('permissions', []))->pluck('name')->toArray();

        $user->syncRoles($roles);
        $user->syncPermissions($permissions);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user-show'), 403);

        return view('users.show')->with([
            'user' => $user->load('roles'),
        ]);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user-edit'), 403);

        return view('users.edit')->with([
            'user' => $user->load('roles'),
            'roles' => Role::all()->pluck('name', 'id'),
            'permissions' => Permission::all()->pluck('name', 'id'),
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

        $roles = Role::whereIn('id', $request->input('roles', []))->pluck('name')->toArray();
        $permissions = Permission::whereIn('id', $request->input('permissions', []))->pluck('name')->toArray();

        $user->syncRoles($roles);
        $user->syncPermissions($permissions);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user-destroy'), 403);

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')->with('error', 'No puedes eliminarte a ti mismo');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
}
