<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hacer nullable los campos segundo_nombre y segundo_apellido en la tabla participantes
        Schema::table('participantes', function (Blueprint $table) {
            $table->string('segundo_nombre')->nullable()->change();
            $table->string('segundo_apellido')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios en puntoskata
       
        // Revertir cambios en participantes
        Schema::table('participantes', function (Blueprint $table) {
            $table->string('segundo_nombre')->nullable(false)->change();
            $table->string('segundo_apellido')->nullable(false)->change();
        });
    }
};
