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
        Schema::create('equiposkata_participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_participantes')->constrained('participantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_equiposkata')->constrained('equiposkata')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equiposkata_participantes');
    }
};
