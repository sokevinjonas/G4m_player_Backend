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
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->text('description')->nullable();

            $table->string('grade')->unique(); // Grade du badge (par exemple : bronze, silver, gold, etc.)
            $table->boolean('is_active')->default(true); // Indique si le badge est actif

            // Critères de déblocage
            $table->integer('required_points')->nullable(); // Total de points requis
            $table->integer('required_wins')->nullable();   // Victoires requises
            $table->integer('required_participations')->nullable(); // Compétitions nécessaires
            $table->integer('required_top3')->nullable();   // Top 3 requis
            $table->timestamps();

            // NB 
            // 1. Bronze
            // 2. Silver
            // 3. Gold
            // 4. Platinum
            // 5. Diamond
            // 6. Crown
            // 7. Ace
            // 8. Ace Master (nouveau)
            // 9. Ace Dominator (nouveau)
        // 10. Conqueror 🏆 (le plus haut rang)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
