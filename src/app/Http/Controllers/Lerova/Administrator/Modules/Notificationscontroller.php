<?php

namespace App\Http\Controllers\Lerova\Administrator\Modules;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class Notificationscontroller extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function edit()
    {
        if (!empty(getJSONFile('md-notifications'))) {

            $users = User::all();

            $notifications = getJSONFile('md-notifications');

            return view('lerova.administrator.notifications.edit', compact('notifications', 'users'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required'
        ]);

        $notifications = array(

            'user_id' => $request->user_id
        );

        Cache::forget('md-notifications');


        try
        {
            File::delete(base_path('data/md-notifications.json'));

            File::put(base_path('data/md-notifications.json'), json_encode($notifications));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
        }

        Session::flash('success', 'Notifications successfully updated!');


        return redirect()->route('lerova.administrator.modules.notifications.edit');
    }

}
