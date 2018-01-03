<?php

namespace App\Http\Controllers\Lerova\Settings\Terms;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TermsController extends Controller
{
    public function __construct()
    {
        if(!getSettingStatus('terms'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
        if (!empty(getJSONFile('terms'))) {
            $terms = getJSONFile('terms');
            return view('lerova.settings.terms.edit', compact('terms'));

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

        $terms = array(
            'title' => request('title'),
            'body' => request('body'),
            'image' => request('image'),
            'updated_at' => Carbon::now()->timestamp,

        );

        try
        {
            File::delete(base_path('data/terms.json'));

            File::put(base_path('data/terms.json'), json_encode($terms));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Imprint successfully updated!');

        return redirect()->route('lerova.settings.terms.edit');
    }

}
