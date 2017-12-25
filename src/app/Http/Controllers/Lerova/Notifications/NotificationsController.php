<?php

namespace App\Http\Controllers\Lerova\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Notification;
use Illuminate\Support\Facades\Session;

class NotificationsController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.modules.notifications'))
        {
            $this->middleware('role:developer');
        }

        $this->middleware('role:administrator', ['only' => ['delete' ]]);
    }

    public function index()
    {
        $notifications = Notification::all();

        return view('lerova.notifications.index', compact('notifications'));
    }

    public function show(Notification $notification)
    {
        return view('lerova.notifications.show')->with(compact('notification'));
    }

    public function archive(Notification $notification)
    {
        $notification->delete();

        Session::flash('success', 'Notification successfully archived!');

        return redirect()->route('lerova.notifications.index');
    }


    public function restore($id)
    {
        Notification::withTrashed()->find($id)->restore();

        Session::flash('success', 'Notification successfully restored!');


        return redirect()->route('lerova.notifications.index');
    }


    public function archived()
    {
        $notifications = Notification::onlyTrashed()->get();

        return view('lerova.notifications.archived')->with(compact('notifications'));
    }

    public function delete($id)
    {
        Notification::withTrashed()->find($id)->forceDelete();

        Session::flash('success', 'Notification successfully deleted!');

        return redirect()->route('lerova.notifications.archived');
    }

}
