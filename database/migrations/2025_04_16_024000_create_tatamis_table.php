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
        Schema::create('tatamis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evento')->constrained('eventos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre', 100);
            $table->enum('estado', ['Libre', 'Ocupado'])->default('Libre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tatamis');
    }
};
