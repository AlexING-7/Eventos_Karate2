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
        Schema::create('presentacioneskata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combate')->constrained('combateskata_equiposkata')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kata',length:100);
            $table->boolean('bunkai');
            $table->enum('color',['rojo','azul']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentacioneskata');
    }
};
