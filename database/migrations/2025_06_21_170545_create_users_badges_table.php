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
        Schema::create('users_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('badge_id')->constrained()->onDelete('cascade');

            $table->boolean('unlocked')->default(false);
            $table->date('earned_at')->nullable();

            // Pour les badges en cours
            $table->integer('current_points')->default(0);
            $table->integer('current_wins')->default(0);
            $table->integer('current_participations')->default(0);
            $table->integer('current_top3')->default(0);

            // Pour les badges en cours de progression
             $table->integer('current_progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_badges');
    }
};
