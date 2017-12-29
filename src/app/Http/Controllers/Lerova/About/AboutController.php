<?php

namespace App\Http\Controllers\Lerova\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function __construct()
    {
        if (!getModuleStatus('about')) {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
        if (!empty(getJSONFile('about'))) {
            $about = getJSONFile('about');
            return view('lerova.about.edit', compact('about'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required',
            'image' => 'nullable|url',
        ]);

        $about = array(
            'title' => request('title'),
            'body' => request('body'),
            'image' => request('image'),
        );

        try {
            File::delete(base_path('data/about.json'));

            File::put(base_path('data/about.json'), json_encode($about));

        } catch (\Exception $e) {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
        }

        return redirect()->back();
    }

}
