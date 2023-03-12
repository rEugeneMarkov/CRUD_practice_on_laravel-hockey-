<?php

namespace App\Http\Controllers\Tournament;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Service\GamesListService;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::get()->all();
        return view('tournament.index', compact('tournaments'));
    }
    public function teams(Tournament $tournament, Team $team)
    {
        return view('tournament.teams', compact('tournament', 'team'));
    }
    public function team(Tournament $tournament, Team $team)
    {
        return view('tournament.team', compact('tournament', 'team'));
    }
    public function games(Tournament $tournament)
    {
        $gamesList = Game::where('tournament_id', $tournament->id)->get();
        if (!isset($gamesList->items)) {
            $gamesList = new GamesListService();
            $gamesList = $gamesList->create($tournament);
        }
        //dd($gamesList);
        return view('tournament.games', compact('tournament', 'gamesList'));
    }
}
