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
        Schema::create('competencias_participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_competencia')->constrained('competencias');
            $table->foreignId('id_participante')->constrained('participantes');
            $table->integer('posicion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias_participantes');
    }
};
