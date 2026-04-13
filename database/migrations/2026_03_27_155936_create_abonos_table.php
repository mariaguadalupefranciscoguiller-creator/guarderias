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
        // El orden correcto es: Blueprint $table
        Schema::create('abonos', function (Blueprint $table) { 
            $table->id('id_abono'); 
            $table->integer('cantidad'); 
            $table->date('fecha');
            $table->unsignedBigInteger('id_registro_cuenta'); 
            
            // BORRA la línea de abajo para que la tabla sea limpia como la de la bodega
            // $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonos');
    }
};
