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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('disciplina', ['Kumite', 'Kata']);
            $table->string('nombre', 100);
            $table->integer('edad_min');
            $table->integer('edad_max')->nullable();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->decimal('peso', 4, 2)->nullable();
            $table->integer('duracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
