<?php

namespace App\Http\Controllers\Lerova\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.modules.gallery'))
        {
            $this->middleware('role:developer');
        }
    }

    public function index()
    {
        $galleries = Gallery::all();

        return view('lerova.gallery.index', compact('galleries'));
    }



}
