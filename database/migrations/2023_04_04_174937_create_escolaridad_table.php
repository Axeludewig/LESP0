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
        Schema::create('escolaridad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('posgrado1');
            $table->string('institucion_educativa_p1');
            $table->string('periodo_de_realizacion_p1');
            $table->string('posgrado2');
            $table->string('institucion_educativa_p2');
            $table->string('periodo_de_realizacion_p2');
            $table->string('licenciatura');
            $table->string('institucion_educativa_lic');
            $table->string('cedula');
            $table->string('periodo_de_realizacion_lic');
            $table->string('carrera_tecnica');
            $table->string('institucion_educativa_ct');
            $table->string('periodo_de_realizacion_ct');
            $table->string('preparatoria');
            $table->string('institucion_educativa_prepa');
            $table->string('periodo_de_realizacion_prepa');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolaridad');
    }
};