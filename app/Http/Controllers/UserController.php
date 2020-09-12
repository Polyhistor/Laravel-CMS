<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::All();

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(User $user)
    {

        // dd(request());

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            // 'password' => ['min:6', 'max:255', 'confirmed'],
            'avatar' => ['file'],
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');

        return back();
    }

    public function attach(User $user, Role $role)
    {


        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user, Role $role)
    {


        $user->roles()->detach(request('role'));

        return back();
    }
}
