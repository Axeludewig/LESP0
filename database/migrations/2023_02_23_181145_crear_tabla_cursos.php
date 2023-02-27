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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('fecha_de_inicio');
            $table->string('fecha_de_terminacion');
            $table->string('valor_curricular');
            $table->string('modalidad');
            $table->string('ubicacion');
            $table->string('tags');
            $table->string('img')->nullable();
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
        Schema::dropIfExists('cursos');
        //
    }
};
