<?php

namespace App\Http\Controllers\Lerova\Members;

use App\Http\Controllers\Controller;
use App\Models\Lerova\Member;
use Smart6ate\Lerova\App\Http\Requests\Members\StoreMembersRequest;
use Smart6ate\Lerova\App\Http\Requests\Members\UpdateMembersRequest;

class MembersController extends Controller
{
    public function __construct()
    {
        if(!config('lerova.modules.members'))
        {
            $this->middleware('role:developer');
        }

        $this->middleware('role:administrator', ['only' => ['delete']]);

    }

    public function index()
    {
        $members = Member::all();

        return view('lerova.members.index', compact('members'));
    }

    public function create()
    {
        return view('lerova.members.create');
    }

    public function store(StoreMembersRequest $request)
    {
        Member::create([
            'name' => request('name'),
            'teaser' => request('teaser'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);

        return redirect()->route('lerova.members.index');
    }

    public function edit(Member $member)
    {
        return view('lerova.members.edit', compact('member'));
    }

    public function update(UpdateMembersRequest $request, Member $member)
    {
        $member->update([

            'name' => request('name'),
            'teaser' => request('teaser'),
            'body' => request('body'),
            'tags' => request('tags'),
            'image' => request('image'),
        ]);

        if(!$member->validate())
        {
            $member->published = false;
            $member->save();
        }

        return redirect()->route('lerova.members.edit', $member);
    }


    public function publish(Member $member)
    {
        if($member->validate())
        {
            $member->published = true;
            $member->save();
        }

        return redirect()->back();
    }

    public function withdraw(Member $member)
    {
        $member->published = false;
        $member->save();

        return redirect()->back();
    }


    public function archived()
    {
        $members = Member::onlyTrashed()->get();

        return view('lerova.members.archived', compact('members'));
    }


    public function archive(Member $member)
    {
        $member->published = false;
        $member->save();
        $member->delete();

        return redirect()->route('lerova.members.index');

    }

    public function restore($id)
    {
        Member::withTrashed()->find($id)->restore();

        return redirect()->route('lerova.members.archived');

    }


    public function destroy($id)
    {
        Member::withTrashed()->find($id)->forceDelete();

        return redirect()->route('lerova.members.archived');
    }


}
