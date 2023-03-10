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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre_curso');
            $table->string('rfc_participante');
            $table->string('nombre_participante');
            $table->string('ubicacion');
            $table->string('fecha_de_inicio');
            $table->string('fecha_de_terminacion');
            $table->string('valor_curricular');
            $table->string('tipo');
            $table->string('img');
            $table->timestamp('fecha_de_registro')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
        //
    }
};