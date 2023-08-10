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
        Schema::create('evals_adquiridas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaladq');
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_evaluador');
            $table->unsignedBigInteger('id_evaluado');
            $table->string('nombre_completo_evaluador');
            $table->string('puesto_evaluador');
            $table->string('firma_del_evaluador')->nullable();
            $table->string('nombre_evaluado');
            $table->string('puesto_evaluado');
            $table->string('area_evaluado');
            $table->string('nombre_capacitacion');
            $table->integer('evaluacion1');
            $table->integer('evaluacion2');
            $table->integer('evaluacion3');
            $table->integer('evaluacion4');
            $table->integer('evaluacion5');
            $table->integer('evaluacion6');
            $table->integer('evaluacion7');
            $table->integer('evaluacion8');
            $table->integer('resultado');
            $table->string('necesidad_capacitacion')->nullable();
            $table->string('descripcion_necesidad')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('validacion_ensenanza')->nullable();
            $table->timestamps();

            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('id_evaladq')->references('id')->on('evals_adq')->onDelete('cascade');
            $table->foreign('id_evaluador')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_evaluado')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evals_adquiridas');
    }
};