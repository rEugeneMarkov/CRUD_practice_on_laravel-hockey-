<?php

namespace App\Http\Controllers\Admin\Player;

use App\Models\Team;
use App\Models\Player;
use App\Models\Position;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Player\StoreRequest;
use App\Http\Requests\Admin\Player\UpdateRequest;

class IndexController extends Controller
{
    public function index()
    {
        $players = Player::paginate(20);
        return view('admin.player.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();
        $positions = Position::all();
        return view('admin.player.create', compact('teams', 'positions'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $teamId = $data['team_id'];
        unset($data['team_id']);
        $player = Player::firstOrCreate($data);
        $player->teams()->attach($teamId);

        return redirect()->route('admin.player.index');
    }

    public function show(Player $player)
    {
        return view('admin.player.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        $positions = Position::all();
        return view('admin.player.edit', compact('player', 'teams', 'positions'));
    }

    public function update(UpdateRequest $request, Player $player)
    {
        $data = $request->validated();
        $player->update($data);

        return view('admin.player.show', compact('player'));
    }

    public function delete(Player $player)
    {
        $player->delete();
        return redirect()->route('admin.player.index');
    }
}
