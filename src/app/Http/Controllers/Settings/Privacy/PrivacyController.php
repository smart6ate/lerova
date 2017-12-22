<?php

namespace App\Http\Controllers\Lerova\Settings\Privacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrivacyController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.settings.privacy'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/privacy.json'));

            $privacy = json_decode($json);

        return view('lerova.settings.privacy.edit', compact('privacy'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required'
        ]);

        $privacy = array(
            'title' => request('title'),
            'body' => request('body'),
        );

        try
        {
            if(File::exists(base_path('data/archiv/privacy.json')))
            {
                File::move(base_path('data/archive/privacy.json'), base_path('data/archive/privacy_old.json'));
            }

            File::delete(base_path('data/archiv/privacy.json'));
            File::move(base_path('data/privacy.json'), base_path('data/archive/privacy.json'));
            File::delete(base_path('data/privacy.json'));

            File::put(base_path('data/privacy.json'), json_encode($privacy));

            File::move(base_path('data/archive/privacy_old.json'), base_path('data/archive/privacy.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/privacy_old.json')))
            {
                File::move(base_path('data/archive/privacy_old.json'), base_path('data/privacy.json'));
            }

            if(File::exists(base_path('data/archiv/privacy.json')))
            {
                File::move(base_path('data/archive/privacy.json'), base_path('data/privacy.json'));
            }
        }

        return redirect()->route('lerova.settings.privacy.edit');
    }

}
