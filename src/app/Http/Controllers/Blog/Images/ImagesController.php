<?php

namespace App\Http\Controllers\Lerova\Blog\Images;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Blog;
use App\Models\Lerova\Page;
use Smart6ate\Lerova\App\Http\Requests\Blog\Images\StoreImagesRequest;
use Smart6ate\Lerova\App\Http\Requests\Blog\Images\UpdateImagesRequest;

class ImagesController extends Controller
{
    public function __construct()
    {
        if (!config('lerova.modules.blog')) {
            $this->middleware('role:developer');
        }

        $this->middleware('role:administrator', ['only' => ['delete']]);
    }


    public function create()
    {
        $pages = Page::all();

        if (!count($pages)) {

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.images.create', compact('pages'));
    }

    public function store(StoreImagesRequest $request)
    {
        Blog::create([

            'uuid' => substr(base_convert(md5(microtime()), 16,32), 0, 12),
            'type' => 'images',
            'language' => config('lerova.core.blog.language'),
            'author_id' => Auth()->user()->id,
            'page_id' => request('page_id'),
            'title' => request('title'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);


        return redirect()->route('lerova.blog.index');

    }

    public function edit(Blog $blog)
    {
        $pages = Page::all();

        if (!count($pages)) {

            return redirect()->route('lerova.blog.index');
        }

        return view('lerova.blog.images.edit', compact('blog', 'pages'));
    }


    public function update(UpdateImagesRequest $request, Blog $blog)
    {
        $blog->update([

            'page_id' => request('page_id'),
            'title' => request('title'),
            'tags' => request('tags'),
            'image' => request('image'),

        ]);


        if (!$blog->validate()) {
            $blog->published = false;
        }

        $blog->save();


        return redirect()->route('lerova.blog.images.edit', $blog);

    }


}
