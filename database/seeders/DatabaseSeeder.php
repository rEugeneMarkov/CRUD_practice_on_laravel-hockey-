<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Team;
use App\Models\Player;
use App\Models\Position;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Position::factory(3)->create();
        Tournament::factory(5)->create();
        Group::factory(15)->create();
        $teams = Team::factory(50)->create();
        $players = Player::factory(1000)->create();

        foreach ($players as $player) {
            $teamsIds = $teams->random(2)->pluck('id');
            $player->teams()->attach($teamsIds);
        }
    }
}
