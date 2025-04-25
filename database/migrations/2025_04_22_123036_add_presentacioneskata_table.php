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
        Schema::table('presentacioneskata', function (Blueprint $table) {
            $table->dropForeign(['id_combate']); // Eliminar la clave foránea
            $table->dropColumn('id_combate'); // Eliminar el campo id_combate
            $table->foreignId('id_combate')->constrained('combates')->onDelete('cascade')->onUpdate('cascade'); // Nuevo campo id_combatesss
            $table->foreignId('id_equipokata')->constrained('equiposkata')->onDelete('cascade')->onUpdate('cascade'); // Nuevo campo id_equipokata
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presentacioneskata', function (Blueprint $table) {
            $table->dropForeign(['id_combate']); // Eliminar la clave foránea de id_combatesss
            $table->dropForeign(['id_equipokata']); // Eliminar la clave foránea de id_equipokata
            $table->dropColumn(['id_combate', 'id_equipokata']); // Eliminar los campos id_combatesss e id_equipokata
            $table->foreignId('id_combate')->constrained('combateskata_equiposkata')->onDelete('cascade')->onUpdate('cascade'); // Restaurar el campo id_combate
        });
    }
};
