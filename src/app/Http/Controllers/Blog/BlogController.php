<?php

namespace App\Http\Controllers\Lerova\Blog;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.modules.blog'))
        {
            $this->middleware('role:developer');
        }
    }

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('lerova.blog.index', compact('blogs'));
    }

    public function publish(Blog $blog)
    {
        if($blog->validate())
        {
            $blog->published = true;
            $blog->save();
        }

        return redirect()->back();
    }

    public function withdraw(Blog $blog)
    {
        $blog->published = false;
        $blog->save();

        return redirect()->back();
    }


    public function archived()
    {
        $blogs = Blog::onlyTrashed()->get();

        return view('lerova.blog.archived', compact('blogs'));
    }


    public function archive(Blog $blog)
    {
        $blog->published = false;
        $blog->save();
        $blog->delete();

        return redirect()->route('lerova.blog.index');

    }

    public function restore($uuid)
    {
        Blog::withTrashed()->findByUuid($uuid)->restore();

        return redirect()->route('lerova.blog.archived');

    }


    public function destroy($uuid)
    {
        Blog::withTrashed()->findByUuid($uuid)->forceDelete();

        return redirect()->route('lerova.blog.archived');
    }

}
