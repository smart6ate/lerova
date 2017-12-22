<?php

namespace App\Http\Controllers\Lerova\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Notification;
use Smart6ate\Lerova\App\Http\Requests\Contacts\StoreContactsRequest;

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

        return redirect()->route('lerova.notifications.index');
    }


    public function store(StoreContactsRequest $request)
    {
        Notification::create([
           'name' => request('name'),
        ]);
    }

    public function restore($id)
    {
        Notification::withTrashed()->find($id)->restore();

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

        return redirect()->route('lerova.notifications.archived');

    }

}
