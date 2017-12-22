<?php

namespace App\Http\Controllers\Lerova\Settings\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LinksController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.settings.links'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/links.json'));

            $links = json_decode($json);

            return view('lerova.settings.links.edit', compact('links'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'pinterest' => 'nullable|url',
        ]);

        $links = array(
            'facebook' => request('facebook'),
            'instagram' => request('instagram'),
            'twitter' => request('twitter'),
            'pinterest' => request('pinterest'),
        );


        try
        {
            File::delete(base_path('data/links.json'));

            File::put(base_path('data/links.json'), json_encode($links));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Links successfully updated!');


        return redirect()->route('lerova.settings.links.edit');
    }

}
