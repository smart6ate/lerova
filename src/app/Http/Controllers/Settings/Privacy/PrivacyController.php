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
            'updated_at' => Carbon::now(),
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
