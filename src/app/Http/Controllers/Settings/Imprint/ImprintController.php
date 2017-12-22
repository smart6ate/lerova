<?php

namespace App\Http\Controllers\Lerova\Settings\Imprint;

use App\Http\Controllers\Controller;
use App\Models\Lerova\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImprintController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.settings.imprint'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/imprint.json'));

            $imprint = json_decode($json);

            return view('lerova.settings.imprint.edit', compact('imprint'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required'
        ]);

        $imprint = array(
            'title' => request('title'),
            'body' => request('body'),
        );

        try
        {
            if(File::exists(base_path('data/archiv/imprint.json')))
            {
                File::move(base_path('data/archive/imprint.json'), base_path('data/archive/imprint_old.json'));
            }

            File::delete(base_path('data/archiv/imprint.json'));
            File::move(base_path('data/imprint.json'), base_path('data/archive/imprint.json'));
            File::delete(base_path('data/imprint.json'));

            File::put(base_path('data/imprint.json'), json_encode($imprint));

            File::move(base_path('data/archive/imprint_old.json'), base_path('data/archive/imprint.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/imprint_old.json')))
            {
                File::move(base_path('data/archive/imprint_old.json'), base_path('data/imprint.json'));
            }

            if(File::exists(base_path('data/archiv/imprint.json')))
            {
                File::move(base_path('data/archive/imprint.json'), base_path('data/imprint.json'));
            }

        }


        return redirect()->route('lerova.settings.imprint.edit');
    }

}
