<?php

namespace App\Http\Controllers\Lerova\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Event;
use App\Models\Lerova\Image;
use App\Models\Lerova\Page;
use App\Models\Lerova\Post;
use Smart6ate\Lerova\App\Http\Requests\Administrator\Pages\StorePageRequest;
use Smart6ate\Lerova\App\Http\Requests\Administrator\Pages\UpdatePageRequest;


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
            'keywords' => json_encode($parts = explode(' ', $request->title)),
        ]);


        return redirect()->route('lerova.administrator.pages.index');
    }


    public function publish(Page $page)
    {
        $page->published = true;
        $page->save();

        return redirect()->route('lerova.administrator.pages.index');
    }

    public function withdraw(Page $page)
    {
        $page->published = false;
        $page->save();

        return redirect()->route('lerova.administrator.pages.index');
    }


    public function delete(Page $page)
    {
        $posts = Post::where('page_id','=',$page->id)->withTrashed()->get();
        $events = Event::where('page_id','=',$page->id)->withTrashed()->get();
        $images = Image::where('page_id','=',$page->id)->withTrashed()->get();

        if (!count($posts) and !count($events) and !count($images))
        {
            $page->published = false;
            $page->forceDelete();
        }

        return redirect()->route('lerova.administrator.pages.index');
    }



}
