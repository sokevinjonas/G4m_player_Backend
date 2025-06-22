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
        Schema::create('competitions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
        $table->string('title');
        $table->text('description')->nullable();
        $table->dateTime('date');
        $table->enum('mode', ['solo', 'duo', 'squad'])->nullable(); // Nouveau
        $table->boolean('is_online')->default(true);
        $table->string('location')->nullable(); // Nouveau si is_online = false
        $table->string('reward')->nullable();
        $table->enum('status', ['upcoming', 'ongoing', 'completed', 'cancel'])->default('upcoming');
        $table->json('rules')->nullable(); // Nouveau
        $table->json('contact_link')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
