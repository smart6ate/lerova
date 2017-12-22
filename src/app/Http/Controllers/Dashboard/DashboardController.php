<?php

namespace App\Http\Controllers\Lerova\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('lerova.dashboard.index');
    }

}
