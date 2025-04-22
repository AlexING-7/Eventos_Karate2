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
        Schema::create('equiposkata', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->enum('genero',['Masculino','Femenino']);
            $table->foreignId('id_competencias')->constrained('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equiposkata');
    }
};
