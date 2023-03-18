<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournaments';
    protected $guarded = false;

    public function groups()
    {
        return $this->hasMany(Group::class, 'tournament_id', 'id');
    }

    public function teams()
    {
        return $this->hasManyThrough(Team::class, Group::class);
    }
}
