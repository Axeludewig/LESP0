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
            $table->string('posgrado1')->nullable();
            $table->string('institucion_educativa_p1')->nullable();
            $table->string('periodo_de_realizacion_p1')->nullable();
            $table->string('posgrado2')->nullable();
            $table->string('institucion_educativa_p2')->nullable();
            $table->string('periodo_de_realizacion_p2')->nullable();
            $table->string('licenciatura')->nullable();
            $table->string('institucion_educativa_lic')->nullable();
            $table->string('cedula')->nullable();
            $table->string('periodo_de_realizacion_lic')->nullable();
            $table->string('carrera_tecnica')->nullable();
            $table->string('institucion_educativa_ct')->nullable();
            $table->string('periodo_de_realizacion_ct')->nullable();
            $table->string('preparatoria')->nullable();
            $table->string('institucion_educativa_prepa')->nullable();
            $table->string('periodo_de_realizacion_prepa')->nullable();
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