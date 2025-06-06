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
            $table->foreignId('id_combate')->constrained('combates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_equipokata')->constrained('combates')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('total', 4, 2)->default(0);
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
