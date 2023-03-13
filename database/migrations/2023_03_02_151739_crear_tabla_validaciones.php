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
        Schema::create('validaciones', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre_curso');
            $table->string('nombre_usuario');
            $table->string('valor_curricular');            
            $table->string('status');
            $table->string('tipo');
            $table->string('folio')->unique();
            $table->timestamp('fecha_de_registro')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validaciones');
        //
    }
};