<?php

namespace App\Http\Controllers\Lerova\Settings\Form;

use App\Http\Controllers\Controller;
use App\Models\Lerova\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            if(File::exists(base_path('data/archiv/form.json')))
            {
                File::move(base_path('data/archive/form.json'), base_path('data/archive/form_old.json'));
            }

            File::delete(base_path('data/archiv/form.json'));
            File::move(base_path('data/form.json'), base_path('data/archive/form.json'));
            File::delete(base_path('data/form.json'));

            File::put(base_path('data/form.json'), json_encode($form));

            File::move(base_path('data/archive/form_old.json'), base_path('data/archive/form.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/form_old.json')))
            {
                File::move(base_path('data/archive/form_old.json'), base_path('data/form.json'));
            }

            if(File::exists(base_path('data/archiv/form.json')))
            {
                File::move(base_path('data/archive/form.json'), base_path('data/form.json'));
            }

        }


        return redirect()->route('lerova.settings.form.edit');
    }

}
