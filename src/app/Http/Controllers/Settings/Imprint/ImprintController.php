<?php

namespace App\Http\Controllers\Lerova\Settings\Imprint;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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
            'body' => 'required',
            'image' => 'nullable|url'
        ]);

        $imprint = array(
            'title' => request('title'),
            'body' => request('body'),
            'image' => request('image'),
            'updated_at' => Carbon::now()->timestamp,

        );

        try
        {
            File::delete(base_path('data/imprint.json'));

            File::put(base_path('data/imprint.json'), json_encode($imprint));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Imprint successfully updated!');

        return redirect()->route('lerova.settings.imprint.edit');
    }

}
