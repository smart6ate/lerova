<?php

namespace App\Http\Controllers\Lerova\Magic;

use App\User;
use Illuminate\Http\Request;

class Authentication
{
    protected  $request, $email;

    protected $identifier = 'email';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function requestLink()
    {
        $user = $this->getUserByIdentifier($this->request->get($this->identifier));

        $user->storeToken()->sendMagicLink([

            'remember' => $this->request->has('remember'),
            'email' => $this->request->email,
        ]);
    }

    public function getUserByIdentifier($value)
    {
        return User::where($this->identifier, $value)->firstOrFail();
    }

}
