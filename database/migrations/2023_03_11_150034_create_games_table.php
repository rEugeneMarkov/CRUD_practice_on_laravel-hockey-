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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('homeTeam');
            $table->unsignedBigInteger('guestTeam');
            $table->boolean('is_played')->nullable();
            $table->string('score')->nullable();
            $table->timestamps();

            $table->index('tournament_id', 'tournament_game_idx');
            $table->foreign('tournament_id', 'tournament_game_fk')->on('tournaments')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
