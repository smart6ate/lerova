<?php

namespace App\Http\Controllers\Lerova\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lerova\Members\StoreMembersRequest;
use App\Http\Requests\Lerova\Members\UpdateMembersRequest;
use App\Models\Lerova\Member;
use Illuminate\Support\Facades\Session;

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

        Session::flash('success', 'Member successfully created!');


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

        Session::flash('success', 'Member successfully updated!');

        return redirect()->route('lerova.members.edit', $member);
    }


    public function publish(Member $member)
    {
        if($member->validate())
        {
            $member->published = true;
            $member->save();

            Session::flash('warning', 'Please fill out all required fields!');

        }

        Session::flash('success', 'Member successfully published!');


        return redirect()->back();
    }

    public function withdraw(Member $member)
    {
        $member->published = false;
        $member->save();

        Session::flash('success', 'Member successfully withdrawn!');


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

        Session::flash('success', 'Member successfully archived!');


        return redirect()->route('lerova.members.index');

    }

    public function restore($id)
    {
        Member::withTrashed()->find($id)->restore();

        Session::flash('success', 'Member successfully restored!');


        return redirect()->route('lerova.members.archived');

    }


    public function destroy($id)
    {
        Member::withTrashed()->find($id)->forceDelete();

        Session::flash('success', 'Member successfully destroyed!');

        return redirect()->route('lerova.members.archived');
    }


}
