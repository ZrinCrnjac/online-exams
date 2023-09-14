<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('add roles')) {
            $users = User::all();

            return view('users.index', compact('users'));
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to view users!');
        }
    }

    public function edit(User $user)
    {
        /** @var User $user */
        $userT = auth()->user();
        $roles = Role::all();

        if($userT->can('add roles')) {
            $user = User::find($user->id);
            return view('users.edit', compact('user', 'roles'));
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to edit users!');
        }
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $userT = auth()->user();

        if($userT->can('add roles')) {
            $user = User::find($request->get('user_id'));
            $user->roles()->detach();
            $user->assignRole($request->get('role'));

            return redirect('users.index')->with('success', 'Role assigned!');
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to assign roles!');
        }
    }
}
