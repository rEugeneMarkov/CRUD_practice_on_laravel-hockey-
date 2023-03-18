<?php

namespace App\Http\Controllers\Admin\Group;

use App\Models\Group;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Requests\Admin\Group\UpdateRequest;

class IndexController extends Controller
{
    public function index()
    {
        $groups = Group::paginate(20);
        return view('admin.group.index', compact('groups'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        return view('admin.group.create', compact('tournaments'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Group::firstOrCreate($data);

        return redirect()->route('admin.group.index');
    }

    public function show(Group $group)
    {
        return view('admin.group.show', compact('group'));
    }

    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);

        return view('admin.group.show', compact('group'));
    }

    public function delete(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.group.index');
    }
}
