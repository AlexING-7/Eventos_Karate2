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
        Schema::create('combates_participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combate')->constrained('combates')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreignId('id_participante')->constrained('participantes')->onDelete('cascade')->onUpdate('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combateskumite_participantes');
    }
};
