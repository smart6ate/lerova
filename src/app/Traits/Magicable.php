<?php

namespace App\Traits\Lerova;

use App\Models\Lerova\UserLoginToken;
use App\Notifications\Lerova\MagicLoginRequested;
use Illuminate\Support\Facades\Notification;

trait Magicable
{

    public function storeToken()
    {
        $this->token()->delete();

        $this->token()->create([
            'token' => str_random(255)
        ]);

        return $this;
    }

    public function sendMagicLink($options)
    {
        Notification::send($this, new MagicLoginRequested($this, $options));

    }

    public function token()
    {
        return $this->hasOne(UserLoginToken::class);
    }



}