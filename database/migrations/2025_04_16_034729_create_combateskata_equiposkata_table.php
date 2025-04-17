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
        Schema::create('combateskata_equiposkata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_equipokata')->constrained('equiposkata');
            $table->foreignId('id_combateskata')->constrained('combateskata');
            $table->boolean('primero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combateskata_equiposkata');
    }
};
