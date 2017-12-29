<?php

namespace App\Http\Controllers\Lerova\Administrator\Modules;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function edit()
    {
        if (!empty(getJSONFile('md-blog'))) {

            $blogs = getJSONFile('md-blog');

            return view('lerova.administrator.blog.edit', compact('blogs'));

        } else {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'posts' => 'required|boolean',
            'images' => 'required|boolean',
            'links' => 'required|boolean',
            'events' => 'required|boolean',
        ]);

        $blog = array(
            'posts' => [
                'name' => 'posts',
                'status' => $request->posts
            ],
            'images' => [
                'name' => 'images',
                'status' => $request->images
            ],
            'events' => [
                'name' => 'events',
                'status' => $request->events
            ],
            'links' => [
                'name' => 'links',
                'status' => $request->links
            ],
        );

        Cache::forget('md-blog');


        try
        {
            File::delete(base_path('data/md-blog.json'));

            File::put(base_path('data/md-blog.json'), json_encode($blog));

        }
        catch (\Exception $e)
        {
            Session::flash('warning', 'Ups! Something went wrong. Please contact the Administrator');
        }

        Session::flash('success', 'Blog successfully updated!');


        return redirect()->route('lerova.administrator.modules.blog.edit');
    }

}
