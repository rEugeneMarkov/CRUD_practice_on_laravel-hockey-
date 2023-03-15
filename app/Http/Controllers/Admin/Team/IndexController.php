<?php

namespace App\Http\Controllers\Admin\Team;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreRequest;
use App\Http\Requests\Admin\Team\UpdateRequest;

class IndexController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(20);
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        return view('admin.team.create', compact('tournaments'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Team::firstOrCreate($data);

        return redirect()->route('admin.team.index');
    }

    public function show(Team $team)
    {
        $tournament = Tournament::where('id', '=', $team->tournament_id)->get();
        return view('admin.team.show', compact('team', 'tournament'));
    }

    public function edit(Team $team)
    {
        $tournaments = Tournament::all();
        return view('admin.team.edit', compact('team', 'tournaments'));
    }

    public function update(UpdateRequest $request, Team $team)
    {
        $data = $request->validated();
        $team->update($data);
        $tournament = Tournament::where('id', '=', $team->tournament_id)->get();

        return view('admin.team.show', compact('team', 'tournament'));
    }

    public function delete(Team $team)
    {
        $team->players()->delete();
        $team->delete();
        return redirect()->route('admin.team.index');
    }
}
