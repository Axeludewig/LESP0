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
            $table->string('numero_consecutivo');
            $table->string('modalidad');
            $table->string('tipo');
            $table->string('nombre_del_responsable');
            $table->string('coordinacion');
            $table->string('dirigido');
            $table->integer('numero_de_asistentes');
            $table->integer('horas_teoricas');
            $table->integer('horas_practicas');
            $table->string('categoria');
            $table->string('auditorio');
            $table->date('fecha_de_inicio');
            $table->date('fecha_de_terminacion');
            $table->text('objetivo_general');
            $table->string('forma_de_evaluacion');
            $table->integer('porcentaje_asistencia');
            $table->integer('calificacion_requerida');
            $table->string('evaluacion_adquirida');
            $table->string('status');
            $table->string('tags');
            $table->string('img')->nullable();
            $table->timestamps('');
            $table->rememberToken();
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