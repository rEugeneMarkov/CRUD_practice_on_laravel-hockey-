<?php

namespace App\Http\Controllers\Main;

use App\Models\Team;
use App\Models\Tournament;
use App\Service\GamesListService;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::get()->all();
        return view('main.index', compact('tournaments'));
    }
}
