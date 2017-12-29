<?php

namespace App\Http\Controllers\Lerova\Blog\Links;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Blog\Events\StoreLinksRequest;
use App\Http\Requests\Lerova\Blog\Events\UpdateLinksRequest;
use App\Models\Lerova\Blog;
use App\Models\Lerova\Page;
use Illuminate\Support\Facades\Session;

class LinksController extends Controller
{
    public function __construct()
    {
        if(!getModuleStatus('blog'))
        {
            $this->middleware('role:developer');
        }

        if(!getBlogStatus('links'))
        {
            $this->middleware('role:developer');
        }
    }


    public function create()
    {
        $pages = Page::all();

        if (!count($pages)) {

            Session::flash('warning', 'Please create a Page first!');

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.links.create', compact('pages'));
    }

    public function store(StoreLinksRequest $request)
    {
        Blog::create([

            'uuid' => substr(base_convert(md5(microtime()), 16,32), 0, 12),
            'type' => 'links',
            'language' => config('lerova.core.blog.language'),
            'author_id' => Auth()->user()->id,
            'page_id' => request('page_id'),
            'title' => request('title'),
            'url' => request('url'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);


        Session::flash('success', 'Link successfully created!');

        return redirect()->route('lerova.blog.index');

    }

    public function edit(Blog $blog)
    {
        $pages = Page::all();

        if (!count($pages)) {

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.links.edit', compact('blog', 'pages'));
    }

    public function update(UpdateLinksRequest $request, Blog $blog)
    {
        $blog->update([

            'page_id' => request('page_id'),
            'title' => request('title'),
            'url' => request('url'),
            'tags' => request('tags'),
            'image' => request('image'),

        ]);


        if (!$blog->validate()) {
            $blog->published = false;
        }

        $blog->save();

        Session::flash('success', 'Link successfully updated!');

        return redirect()->route('lerova.blog.links.edit', $blog);
    }

}
