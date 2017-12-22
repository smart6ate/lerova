<?php

namespace App\Http\Controllers\Lerova\Settings\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactsController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.settings.contact_details'))
        {
            $this->middleware('role:developer');
        }
    }

    public function edit()
    {
            $json = File::get(base_path('data/contacts.json'));

            $contacts = json_decode($json);

            return view('lerova.settings.contacts.edit', compact('contacts'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
        ]);

        $contacts = array(
            'email' => request('email'),
            'phone' => request('phone'),

        );

        try
        {
            if(File::exists(base_path('data/archiv/contacts.json')))
            {
                File::move(base_path('data/archive/contacts.json'), base_path('data/archive/contacts_old.json'));
            }

            File::delete(base_path('data/archiv/contacts.json'));
            File::move(base_path('data/contacts.json'), base_path('data/archive/contacts.json'));
            File::delete(base_path('data/contacts.json'));

            File::put(base_path('data/contacts.json'), json_encode($contacts));

            File::move(base_path('data/archive/contacts_old.json'), base_path('data/archive/contacts.json'));

        }
        catch (\Exception $e)
        {
            if(File::exists(base_path('data/archiv/contacts_old.json')))
            {
                File::move(base_path('data/archive/contacts_old.json'), base_path('data/contacts.json'));
            }

            if(File::exists(base_path('data/archiv/contacts.json')))
            {
                File::move(base_path('data/archive/contacts.json'), base_path('data/contacts.json'));
            }

        }


        return redirect()->route('lerova.settings.contacts.edit');
    }

}
