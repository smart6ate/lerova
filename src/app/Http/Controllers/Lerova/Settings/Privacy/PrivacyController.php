<?php

namespace App\Http\Controllers\Lerova\Settings\Privacy;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PrivacyController extends Controller
{
    public function __construct()
    {
        if(!getSettingStatus('privacy'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
        if (!empty(getJSONFile('privacy'))) {
            $privacy = getJSONFile('privacy');
            return view('lerova.settings.privacy.edit', compact('privacy'));

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
            'image' => 'nullable|url'

        ]);

        $privacy = array(
            'title' => request('title'),
            'body' => request('body'),
            'image' => request('image'),
            'updated_at' => Carbon::now()->timestamp
        );

        try
        {
            File::delete(base_path('data/privacy.json'));

            File::put(base_path('data/privacy.json'), json_encode($privacy));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Privacy successfully updated!');


        return redirect()->route('lerova.settings.privacy.edit');
    }

}
