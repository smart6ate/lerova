<?php

namespace App\Http\Controllers\Lerova\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Smart6ate\Lerova\App\Http\Requests\Users\UpdatePasswordRequest;

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

        return redirect()->route('lerova.profile.index');
    }
}
