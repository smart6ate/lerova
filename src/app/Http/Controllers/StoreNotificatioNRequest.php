<?php

namespace App\Http\Controllers;

use App\Models\Lerova\Notification;
use App\Notifications\Lerova\ForwardNotificationRequest;

class StoreNotificationRequest extends Controller
{
    public function send()
    {
        $notification = new Notification;

        $notification->name = 'Sebastian Fix';
        $notification->email = 'sfix@me.com';
        $notification->phone = '0041797308971';
        $notification->body = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';

        $notification->save();

        \Illuminate\Support\Facades\Notification::send($this, new ForwardNotificationRequest($notification));

        return redirect()->back();
    }
}