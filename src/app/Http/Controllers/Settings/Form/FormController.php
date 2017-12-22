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
        if(!config('lerova.settings.contact_form'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/form.json'));

            $form = json_decode($json);

            return view('lerova.settings.form.edit', compact('form'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'string',
            'image' => 'url',
            'body' => ''
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
