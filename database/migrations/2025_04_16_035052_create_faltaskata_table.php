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
        Schema::create('faltaskata', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100);
            $table->text('descripcion');
            $table->decimal('deduccion', 2, 2)->default(0);
            $table->foreignId('id_puntosjuezkata')->constrained('puntosjuezkata')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faltaskata');
    }
};
