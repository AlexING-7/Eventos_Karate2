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
        Schema::create('combateskumite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tatami')->constrained('tatamis');
            $table->foreignId('id_ronda')->constrained('rondas');
            $table->dateTime('comienza');
            $table->dateTime('finaliza');
            $table->foreignId('ganador')->nullable()->constrained('participantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combateskumite');
    }
};
