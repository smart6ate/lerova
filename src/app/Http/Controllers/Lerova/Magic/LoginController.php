<?php

namespace App\Http\Controllers\Lerova\Magic;

use App\Http\Controllers\Controller;
use App\Models\Lerova\UserLoginToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $redirectOnRequest = '/login/magic';

    public function show()
    {
        return view('lerova.magic.login');
    }

    public function sendToken(Request $request, Authentication $auth)
    {
        $this->validateLogin($request);

        $auth->requestLink();

        Session::flash('success', 'We\'ve send you a magic link!');

        return redirect()->to($this->redirectOnRequest);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);
    }

    protected function validateToken(Request $request, UserLoginToken $token)
    {
        $token->delete();

        if($token->isExpired())
        {
            Session::flash('warning', 'That magic link has expired!');

            return redirect()->route('login.magic');
        }

        if(!$token->belongsToEmail($request->email))
        {
            Session::flash('warning', 'Invalid magic link!');

            return redirect()->route('login.magic');

        }

        Auth::login($token->user, $request->remember);

        $token->user->last_activity = Carbon::now();
        $token->user->save();

        return redirect()->route('lerova.dashboard.index');
    }
}
