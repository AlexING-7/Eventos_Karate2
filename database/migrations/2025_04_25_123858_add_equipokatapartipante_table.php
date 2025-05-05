<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renombrar columnas en la tabla equiposkata
        Schema::table('equiposkata', function (Blueprint $table) {
            $table->renameColumn('id_competencias', 'id_competencia');
        });

        // Renombrar columnas en la tabla equiposkata_participantes
        Schema::table('equiposkata_participantes', function (Blueprint $table) {
            $table->renameColumn('id_equiposkata', 'id_equipokata');
            $table->renameColumn('id_participantes', 'id_participante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios en la tabla equiposkata
        Schema::table('equiposkata', function (Blueprint $table) {
            $table->renameColumn('id_competencia', 'id_competencias');
        });

        // Revertir cambios en la tabla equiposkata_participantes
        Schema::table('equiposkata_participantes', function (Blueprint $table) {
            $table->renameColumn('id_equipokata', 'id_equiposkata');
            $table->renameColumn('id_participante', 'id_participantes');
        });
    }
};
