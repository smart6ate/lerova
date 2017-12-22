<?php

namespace App\Http\Controllers\Lerova\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            if(File::exists(base_path('data/archiv/about.json')))
            {
                File::move(base_path('data/archive/about.json'), base_path('data/archive/about_old.json'));
            }

            File::delete(base_path('data/archiv/about.json'));
            File::move(base_path('data/about.json'), base_path('data/archive/about.json'));
            File::delete(base_path('data/about.json'));

            File::put(base_path('data/about.json'), json_encode($about));

            File::move(base_path('data/archive/about_old.json'), base_path('data/archive/about.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/about_old.json')))
            {
                File::move(base_path('data/archive/about_old.json'), base_path('data/about.json'));
            }

            if(File::exists(base_path('data/archiv/about.json')))
            {
                File::move(base_path('data/archive/about.json'), base_path('data/about.json'));
            }

        }

        return redirect()->route('lerova.about.edit');
    }

}
