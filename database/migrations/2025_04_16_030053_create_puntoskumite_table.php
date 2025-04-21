<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('puntoskumite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combate')->constrained('combates')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreignId('id_participante')->constrained('participantes')->onDelete('cascade')->onUpdate('cascade');;
            $table->enum('color', ['rojo', 'azul']);
            $table->boolean('senshu');
            $table->integer('yuko')->default(0);
            $table->integer('waza_ari')->default(0);
            $table->integer('ippon')->default(0);
            $table->timestamps();
        });
        DB::statement("
        ALTER TABLE puntoskumite 
        ADD total INT 
        GENERATED ALWAYS AS ((yuko * 1) + (waza_ari * 2) + (ippon * 3)) STORED
        AFTER ippon
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntoskumite');
    }
};
