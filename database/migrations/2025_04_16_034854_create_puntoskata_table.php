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
        Schema::create('puntoskata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combate')->constrained('combateskata_equiposkata');
            $table->decimal('resultado_atletico', 2, 2)->nullable();
            $table->decimal('resultado_tecnico', 2, 2)->nullable(); 
            $table->decimal('total', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntoskata');
    }
};
