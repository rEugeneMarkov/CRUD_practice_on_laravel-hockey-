<?php

namespace App\Http\Controllers\Admin\Tournament;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tournament\StoreRequest;
use App\Http\Requests\Admin\Tournament\UpdateRequest;

class IndexController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::paginate(20);
        return view('admin.tournament.index', compact('tournaments'));
    }

    public function create()
    {
        return view('admin.tournament.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tournament::firstOrCreate($data);

        return redirect()->route('admin.tournament.index');
    }

    public function show(Tournament $tournament)
    {
        return view('admin.tournament.show', compact('tournament'));
    }

    public function edit(Tournament $tournament)
    {
        return view('admin.tournament.edit', compact('tournament'));
    }

    public function update(UpdateRequest $request, Tournament $tournament)
    {
        $data = $request->validated();
        $tournament->update($data);

        return view('admin.tournament.show', compact('tournament'));
    }

    public function delete(Tournament $tournament)
    {
        foreach ($tournament->teams as $team) {
            $team->players()->delete();
            $team->delete();
        }
        $tournament->delete();
        return redirect()->route('admin.tournament.index');
    }
}
