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
        Schema::create('puntosjuezkata', function (Blueprint $table) {
            $table->id();
            $table->integer('juez');
            $table->decimal('puntaje_atletico', 2, 2);
            $table->decimal('puntaje_tecnico', 2, 2);
            $table->foreignId('id_puntoskata')->constrained('puntoskata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntosjuezkata');
    }
};
