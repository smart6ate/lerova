<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function edit()
    {
        if (!empty(getJSONFile('settings'))) {
            $settings = getJSONFile('settings');
            return view('lerova.administrator.settings.edit', compact('settings'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }


    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'general' => 'boolean|required',
            'company' => 'boolean|required',
            'contact_form' => 'boolean|required',
            'pages' => 'boolean|required',
            'metadata' => 'boolean|required',
            'links' => 'boolean|required',
            'legal' => 'boolean|required',
            'imprint' => 'boolean|required',
            'privacy' => 'boolean|required',
        ]);

        $settings = array(

            'status' => [
                'name' => 'status',
                'status' => $request->status
            ],
            'general' => [
                'name' => 'general',
                'status' => $request->general
            ],
            'company' => [
                'name' => 'company',
                'status' => $request->company
            ],
            'contact_form' => [
                'name' => 'contact_form',
                'status' => $request->contact_form
            ],
            'pages' => [
                'name' => 'pages',
                'status' => $request->pages
            ],
            'metadata' => [
                'name' => 'metadata',
                'status' => $request->metadata
            ],
            'links' => [
                'name' => 'links',
                'status' => $request->links
            ],
            'legal' => [
                'name' => 'legal',
                'status' => $request->legal
            ],
            'imprint' => [
                'name' => 'imprint',
                'status' => $request->imprint
            ],
            'privacy' => [
                'name' => 'privacy',
                'status' => $request->privacy
            ],
        );

        Cache::forget('settings');


        try
        {
            File::delete(base_path('data/settings.json'));

            File::put(base_path('data/settings.json'), json_encode($settings));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
        }

        Session::flash('success', 'Settings successfully updated!');


        return redirect()->route('lerova.administrator.settings.edit');
    }

}
