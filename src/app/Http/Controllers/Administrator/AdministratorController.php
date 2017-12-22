<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function index()
    {
        return view('lerova.administrator.index');
    }
}
