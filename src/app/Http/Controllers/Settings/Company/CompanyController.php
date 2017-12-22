<?php

namespace App\Http\Controllers\Lerova\Settings\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.settings.company'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/company.json'));

            $company = json_decode($json);

            return view('lerova.settings.company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'web' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'github' => 'nullable|url',
        ]);

        $company = array(
            'email' => request('email'),
            'phone' => request('phone'),
            'web' => request('web'),
            'google_maps' => request('google_maps'),
            'github' => request('github'),

        );

        try
        {
            File::delete(base_path('data/company.json'));

            File::put(base_path('data/company.json'), json_encode($company));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }

        Session::flash('success', 'Company Details successfully updated!');

        return redirect()->route('lerova.settings.company.edit');
    }

}