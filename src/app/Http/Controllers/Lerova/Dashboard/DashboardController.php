<?php

namespace App\Http\Controllers\Lerova\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('lerova.dashboard.index');
    }

}
