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
    Schema::create('familiar', function (Blueprint $table) {
        $table->id('id_fam'); // La llave que el estudiante definió
        $table->id('id_persona');
        $table->string('DNI'); 
        $table->string('dir');
        $table->id('id_ninio'); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar');
    }
};
