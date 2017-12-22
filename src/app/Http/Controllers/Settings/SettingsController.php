<?php

namespace App\Http\Controllers\Lerova\Settings;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('lerova.settings.index');
    }
}
