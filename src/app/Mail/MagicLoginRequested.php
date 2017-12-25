<?php

namespace App\Mail\Lerova;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MagicLoginRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $options)
    {
        $this->user = $user;
        $this->options = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Authentication Request')->view('email.lerova.auth.magic.link')->with([

            'link' => $this->buildLink(),
        ]);
    }

    protected function buildLink()
    {
        return url('/login/magic/' . $this->user->token->token . '?' . http_build_query($this->options));
    }
}
