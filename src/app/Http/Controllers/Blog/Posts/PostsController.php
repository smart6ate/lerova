<?php

namespace App\Http\Controllers\Lerova\Blog\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Blog\Posts\StorePostsRequest;
use App\Http\Requests\Lerova\Blog\Posts\UpdatePostsRequest;
use App\Models\Lerova\Blog;
use App\Models\Lerova\Page;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function __construct()
    {
        if (!config('lerova.modules.blog')) {
            $this->middleware('role:developer');
        }

        if (!config('lerova.blog.create_posts')) {
            $this->middleware('role:developer');
        }

        $this->middleware('role:administrator', ['only' => ['delete']]);
    }

    public function create()
    {
        $pages = Page::all();

        if (!count($pages)) {

            Session::flash('warning', 'Please create a Page first!');

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.posts.create', compact('pages'));
    }


    public function store(StorePostsRequest $request)
    {
        Blog::create([
            'uuid' => substr(base_convert(md5(microtime()), 16, 32), 0, 12),
            'type' => 'posts',
            'language' => config('lerova.core.blog.language'),
            'author_id' => Auth()->user()->id,
            'page_id' => request('page_id'),
            'title' => request('title'),
            'teaser' => request('teaser'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);

        Session::flash('success', 'Post successfully created!');


        return redirect()->route('lerova.blog.index');

    }

    public function edit(Blog $blog)
    {
        $pages = Page::all();

        if (!count($pages)) {

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.posts.edit', compact('blog', 'pages'));
    }

    public function update(UpdatePostsRequest $request, Blog $blog)
    {
        $blog->update([

            'page_id' => request('page_id'),
            'title' => request('title'),
            'teaser' => request('teaser'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);

        if(!$blog->validate())
        {
            $blog->published = false;
            $blog->save();
        }

        Session::flash('success', 'Post successfully updated!');

        return redirect()->route('lerova.blog.posts.edit',$blog);

    }


}
