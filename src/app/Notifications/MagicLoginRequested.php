<?php

namespace App\Notifications\Lerova;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MagicLoginRequested extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user;
    public $options;

    public function __construct(User $user, $options)
    {
        $this->user = $user;
        $this->options = $options;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/login/magic/' . $this->user->token->token . '?' . http_build_query($this->options));

        dd($url);

        return (new MailMessage)
            ->line('You are receiving this email because we received a authentication request for your account.')
            ->action('Login', $url)
            ->line('If you did not request a authentications request, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
