<?php

namespace App\Http\Controllers\Lerova\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Users\UpdatePasswordRequest;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PasswordController extends Controller
{

    public function __construct()
    {
    }

    public function update(UpdatePasswordRequest $request, User $user)
    {
        if (!$user->isSameAs(Auth::user()))
        {
            abort(404);
        }

        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        Session::flash('success', 'Password successfully updated!');

        return redirect()->route('lerova.profile.index');
    }
}
