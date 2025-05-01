<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renombrar columnas en la tabla equiposkata
        Schema::table('grupos_participantes', function (Blueprint $table) {
            $table->integer('puntos')->nullable()->after('id_grupo');
            $table->integer('combates')->nullable()->after('puntos');        
        });

        // Renombrar columnas en la tabla equiposkata_participantes
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios en la tabla equiposkata
        Schema::table('grupos_participantes', function (Blueprint $table) {
            $table->dropColumn('puntos');
            $table->dropColumn('combates');
        });

      
    }
};
