<?php

namespace App\Http\Controllers\Lerova\Blog\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Blog\Events\StoreEventsRequest;
use App\Http\Requests\Lerova\Blog\Events\UpdateEventsRequest;
use App\Models\Lerova\Blog;
use App\Models\Lerova\Page;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.modules.blog'))
        {
            $this->middleware('role:developer');
        }
        $this->middleware('role:administrator', ['only' => ['delete' ]]);

    }

    public function create()
    {
        $pages = Page::all();

        if (!count($pages)) {

            Session::flash('warning', 'Please create a Page first!');

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.events.create', compact('pages'));
    }

    public function store(StoreEventsRequest $request)
    {
        Blog::create([

            'uuid' => substr(base_convert(md5(microtime()), 16,32), 0, 12),
            'type' => 'events',
            'language' => config('lerova.core.blog.language'),
            'author_id' => Auth()->user()->id,

            'page_id' => request('page_id'),
            'time' => request('time'),
            'title' => request('title'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),

        ]);


        Session::flash('success', 'Event successfully created!');


        return redirect()->route('lerova.blog.index');
    }

    public function edit(Blog $blog)
    {
        $pages = Page::all();

        if (!count($pages)) {

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.events.edit', compact('blog', 'pages'));
    }

    public function update(UpdateEventsRequest $request, Blog $blog)
    {
        $blog->update([
            'page_id' => request('page_id'),
            'time' => request('time'),
            'title' => request('title'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),

        ]);

        if(!$blog->validate())
        {
            $blog->published = false;
        }
        $blog->save();

        Session::flash('success', 'Event successfully updated!');

        return redirect()->route('lerova.blog.events.edit', $blog);

    }

}
