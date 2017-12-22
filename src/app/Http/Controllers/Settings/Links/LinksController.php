<?php

namespace App\Http\Controllers\Lerova\Settings\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'github' => 'nullable|url',
        ]);

        $links = array(
            'facebook' => request('facebook'),
            'instagram' => request('instagram'),
            'twitter' => request('twitter'),
            'pinterest' => request('pinterest'),
            'github' => request('github'),
        );

        try
        {
            if(File::exists(base_path('data/archiv/links.json')))
            {
                File::move(base_path('data/archive/links.json'), base_path('data/archive/links_old.json'));
            }

            File::delete(base_path('data/archiv/links.json'));
            File::move(base_path('data/links.json'), base_path('data/archive/links.json'));
            File::delete(base_path('data/links.json'));

            File::put(base_path('data/links.json'), json_encode($links));

            File::move(base_path('data/archive/links_old.json'), base_path('data/archive/links.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/links_old.json')))
            {
                File::move(base_path('data/archive/links_old.json'), base_path('data/links.json'));
            }

            if(File::exists(base_path('data/archiv/links.json')))
            {
                File::move(base_path('data/archive/links.json'), base_path('data/links.json'));
            }

        }


        return redirect()->route('lerova.settings.links.edit');
    }

}
