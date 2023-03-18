<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('player_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();

            $table->index('player_id', 'player_team_player_idx');
            $table->index('team_id', 'player_team_team_idx');

            $table->foreign('player_id', 'player_team_player_fk')->on('players')->references('id');
            $table->foreign('team_id', 'player_team_team_fk')->on('teams')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_teams');
    }
};
