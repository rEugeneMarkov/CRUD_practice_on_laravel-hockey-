<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournaments';
    protected $guarded = false;

    public function teams()
    {
        return $this->hasMany(Team::class, 'tournament_id', 'id');
    }
    public function games()
    {
        return $this->hasMany(Game::class, 'tournament_id', 'id');
    }
}
