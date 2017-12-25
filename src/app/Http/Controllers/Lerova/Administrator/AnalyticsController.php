<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class AnalyticsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function edit()
    {
        $json = File::get(base_path('data/analytics.json'));

        $analytics = json_decode($json);

        return view('lerova.administrator.analytics.edit', compact('analytics'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'google_analytics' => 'nullable|string',
            'facebook_pixel' => 'nullable|string',
        ]);

        $analytics = array(
            'google_analytics' => request('google_analytics'),
            'facebook_pixel' => request('facebook_pixel'),
        );

        try
        {
            File::delete(base_path('data/analytics.json'));

            File::put(base_path('data/analytics.json'), json_encode($analytics));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Analytics successfully updated!');


        return redirect()->route('lerova.administrator.analytics.edit');
    }

}
