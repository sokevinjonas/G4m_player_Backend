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
            $table->foreignId('type_game_id')->constrained('types_games')->onDelete('cascade'); // Référence à la table types_games
            $table->string('name')->unique();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->json('contact_link')->nullable(); // Ex: Discord, Telegram, etc avec leurs liens.
            $table->timestamps();
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
