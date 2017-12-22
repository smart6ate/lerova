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
        if(!config('lerova.modules.about'))
        {
            $this->middleware('role:developer');
        }

    }

    public function edit()
    {
        $json = File::get(base_path('data/about.json'));

        $about = json_decode($json);

        return view('lerova.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required',
            'image' => 'required|url',
        ]);

        $about = array(
            'title' => request('title'),
            'body' => request('body'),
            'image' => request('image'),
        );

        try
        {
            File::delete(base_path('data/about.json'));

            File::put(base_path('data/about.json'), json_encode($about));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

            return redirect()->route('lerova.about.edit');
    }

}
