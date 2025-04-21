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
        Schema::create('combates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tatami')->constrained('tatamis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_ronda')->constrained('rondas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_competencia')->constrained('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('estado',['por comenzar','en curso','finalizado']);
            $table->dateTime('inicia');
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
