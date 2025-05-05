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
        Schema::table('puntoskata', function (Blueprint $table) {
            $table->dropForeign(['id_equipokata']); // Asegúrate de que el nombre sea correcto
            $table->foreign('id_equipokata')->references('id')->on('equiposkata')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('puntoskata', function (Blueprint $table) {
            $table->dropForeign(['id_equipokata']); // Asegúrate de que el nombre sea correcto
            // Opcional: restaurar la clave foránea original si es necesario
        });
    }
};
