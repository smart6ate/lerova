<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class ModulesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function edit()
    {
        if (!empty(getJSONFile('modules'))) {
            $modules = getJSONFile('modules');
            return view('lerova.administrator.modules.edit', compact('modules'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'blog' => 'boolean|required',
            'gallery' => 'boolean|required',
            'about' => 'boolean|required',
            'members' => 'boolean|required',
            'notifications' => 'boolean|required',
        ]);

        $modules = array(

            'blog' => [
                'name' => 'blog',
                'status' => $request->blog
            ],
            'gallery' => [
                'name' => 'gallery',
                'status' => $request->gallery
            ],
            'about' => [
                'name' => 'about',
                'status' => $request->about
            ],
            'members' => [
                'name' => 'members',
                'status' => $request->members
            ],
            'notifications' => [
                'name' => 'notifications',
                'status' => $request->notifications
            ],
        );

        Cache::forget('modules');


        try
        {
            File::delete(base_path('data/modules.json'));

            File::put(base_path('data/modules.json'), json_encode($modules));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
        }

        Session::flash('success', 'Modules successfully updated!');


        return redirect()->route('lerova.administrator.modules.edit');
    }

}
