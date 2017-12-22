<?php

namespace App\Http\Controllers\Lerova\Settings\Meta;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Page;
use Smart6ate\Lerova\App\Http\Requests\Settings\Pages\UpdatePageRequest;

class MetaController extends Controller
{

    public function __construct()
    {
        if(!config('lerova.settings.metadata'))
        {
            $this->middleware('role:developer');
        }

        $this->middleware('role:administrator', ['only' => ['delete' ]]);
    }

    public function index()
    {
        $pages = Page::published()->get();

        return view('lerova.settings.meta.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('lerova.settings.meta.edit',compact('page'));
    }


    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->title = $request->title;
        $page->description = $request->description;
        $page->keywords = $request->keywords;
        $page->image = $request->image;
        $page->published = true;

        $page->save();

        return redirect()->route('lerova.settings.meta.edit', $page);
    }
}
