<?php

namespace App\Http\Controllers\Lerova\Settings\Meta;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Settings\Pages\UpdatePageRequest;
use App\Models\Lerova\Page;
use Illuminate\Support\Facades\Session;

class MetaController extends Controller
{

    public function __construct()
    {
        if(!getSettingStatus('metadata'))
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

        Session::flash('success', 'Metadata successfully updated!');


        return redirect()->route('lerova.settings.meta.edit', $page);
    }
}
