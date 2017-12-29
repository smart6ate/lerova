<?php

namespace App\Http\Controllers\Lerova\Settings\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function __construct()
    {
        if(!getSettingStatus('contact_form'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
        if (!empty(getJSONFile('form'))) {
            $form = getJSONFile('form');
            return view('lerova.settings.form.edit', compact('form'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }


    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullablestring',
            'image' => 'nullable|url',
            'body' => 'nullable|string'
        ]);

        $form = array(
            'title' => request('title'),
            'image' => request('image'),
            'body' => request('body'),
        );

        try
        {
            File::delete(base_path('data/form.json'));

            File::put(base_path('data/form.json'), json_encode($form));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Plese contact the Administrator');
        }


        Session::flash('success', 'Contact Form successfully updated!');


        return redirect()->route('lerova.settings.form.edit');
    }

}
