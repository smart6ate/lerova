<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Administrator\Pages\StorePageRequest;
use App\Models\Lerova\Blog;
use App\Models\Lerova\Page;
use Illuminate\Support\Facades\Session;


class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);


    }

    public function index()
    {
        $pages = Page::all();

        return view('lerova.administrator.pages.index', compact('pages'));
    }


    public function create()
    {
        return view('lerova.administrator.pages.create');
    }


    public function store(StorePageRequest $request)
    {
          Page::create([
            'type' => config('lerova.core.pages.type'),
            'language' => config('lerova.core.pages.language'),
            'description' => config('lerova.core.pages.description'),
            'image' => config('lerova.core.pages.image'),
            'title' => $request->title,
            'keywords' => $parts = explode(' ', $request->title),
        ]);


        Session::flash('success', 'Pages successfully created!');


        return redirect()->route('lerova.administrator.pages.index');
    }


    public function publish(Page $page)
    {
        $page->published = true;
        $page->save();

        Session::flash('success', 'Page successfully published!');


        return redirect()->route('lerova.administrator.pages.index');
    }

    public function withdraw(Page $page)
    {
        $page->published = false;
        $page->save();

        Session::flash('success', 'Page successfully withdrawn!');


        return redirect()->route('lerova.administrator.pages.index');
    }


    public function delete(Page $page)
    {
        $blogs = Blog::where('page_id','=',$page->id)->withTrashed()->get();

        if (!count($blogs))
        {
            $page->published = false;
            $page->forceDelete();
        }

        Session::flash('success', 'Page successfully delted!');


        return redirect()->route('lerova.administrator.pages.index');
    }



}
