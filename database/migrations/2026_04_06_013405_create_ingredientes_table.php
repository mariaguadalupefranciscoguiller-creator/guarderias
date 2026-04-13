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
    Schema::create('ingredientes', function (Blueprint $table) {
        $table->id('id_ingrediente'); // Tu llave
        $table->string('nombre');      // El nombre del ingrediente
        // AQUÍ NO DEBE HABER NADA MÁS (Ni timestamps ni softDeletes)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
