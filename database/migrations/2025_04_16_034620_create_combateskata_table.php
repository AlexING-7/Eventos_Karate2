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
        Schema::create('combateskata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tatami')->constrained('tatamis')->onUpdate('cascade');
            $table->foreignId('id_ronda')->constrained('rondas')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('modalidad', ['individual', 'equipos']);
            $table->time('comienza');
            $table->time('finaliza');
            $table->foreignId('ganador')->constrained('equiposkata')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combateskata');
    }
};
