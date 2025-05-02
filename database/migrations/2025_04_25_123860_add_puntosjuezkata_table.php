<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renombrar columnas en la tabla equiposkata
        Schema::table('puntosjuezkata', function (Blueprint $table) {
            $table->boolean('sesgo')->default(0)->after('puntaje');
     
        });

        // Renombrar columnas en la tabla equiposkata_participantes
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios en la tabla equiposkata
        Schema::table('puntosjuezkata', function (Blueprint $table) {
            $table->dropColumn('sesgo');
        });

      
    }
};
