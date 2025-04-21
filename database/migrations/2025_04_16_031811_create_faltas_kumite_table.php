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
        Schema::create('faltas_kumite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combate')->constrained('combates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_participante')->constrained('participantes')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('tipo_falta', ['chikaku', 'hansoku-chui', 'hansoku', 'shikaku','kiken','hantei']);
            $table->text('motivo');
            $table->time('tiempo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faltas_kumite');
    }
};
