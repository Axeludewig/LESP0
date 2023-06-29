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
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso');
            $table->integer('numero');
            $table->string('fechayhora')->nullable();
            $table->string('contenido_tematico')->nullable();
            $table->string('objetivos')->nullable();
            $table->string('tecnica')->nullable();
            $table->string('responsable')->nullable();
            $table->float('horas_teoricas')->nullable();
            $table->float('horas_practicas')->nullable();
            $table->string('referencia')->nullable();
            $table->timestamps();
        });

        Schema::table('temas', function (Blueprint $table) {
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas');
    }
};