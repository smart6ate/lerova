<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Administrator\Pages\StoreUserRequest;
use App\Http\Requests\Lerova\Administrator\Pages\UpdateUserRoleRequest;
use App\Models\Lerova\Role;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function index()
    {
        $users = User::all();

        return view('lerova.administrator.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();

        return view('lerova.administrator.users.create', compact('roles'));
    }


    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (!empty($request->role_id))
        {
            $role = Role::findOrFail($request->role_id);

            $user->roles()->attach($role);
        }

        Session::flash('success', 'User successfully created!');

        return redirect()->route('lerova.administrator.users.index');
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('lerova.administrator.users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUserRoleRequest $request, User $user)
    {
        if(!Auth::user()->isSameAs($user))
        {
            $user->roles()->sync($request->role);
        }

        Session::flash('success', 'User Role successfully updated!');


        return redirect()->route('lerova.administrator.users.index');
    }


    public function archive(User $user)
    {

        if(!Auth::user()->isSameAs($user))
        {
            $user->delete();
        }

        Session::flash('success', 'User successfully archived!');


        return redirect()->back();

    }

}
