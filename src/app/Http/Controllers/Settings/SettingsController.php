<?php

namespace App\Http\Controllers\Lerova\Settings;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function __construct()
    {
        if(!config('lerova.settings.status'))
        {
            $this->middleware('role:administrator');
        }

    }

    public function index()
    {
        return view('lerova.settings.index');
    }
}
