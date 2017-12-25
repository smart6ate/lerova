<?php

namespace App\Http\Controllers\Lerova\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $user = Auth::user();

        return view('lerova.profile.index', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        if (!$user->isSameAs(Auth::user()))
        {
            abort(404);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        Session::flash('success', 'Profile successfully updated!');

        return redirect()->route('lerova.profile.index');
    }
}
