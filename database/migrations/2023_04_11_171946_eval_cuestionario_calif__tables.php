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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cuestionario');
            $table->string('nombre');
            $table->string('video');
            $table->string('numero_consecutivo');
            $table->timestamps();
        });

        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaluacion');
            $table->string('pregunta1');
            $table->string('pregunta1_opcion1');
            $table->string('pregunta1_opcion2');
            $table->string('pregunta1_opcion3');
            $table->string('pregunta1_opcion4');
            $table->string('pregunta1_opcion5');
            $table->string('pregunta2');
            $table->string('pregunta2_opcion1');
            $table->string('pregunta2_opcion2');
            $table->string('pregunta2_opcion3');
            $table->string('pregunta2_opcion4');
            $table->string('pregunta2_opcion5');
            $table->string('pregunta3');
            $table->string('pregunta3_opcion1');
            $table->string('pregunta3_opcion2');
            $table->string('pregunta3_opcion3');
            $table->string('pregunta3_opcion4');
            $table->string('pregunta3_opcion5');
            $table->string('pregunta4');
            $table->string('pregunta4_opcion1');
            $table->string('pregunta4_opcion2');
            $table->string('pregunta4_opcion3');
            $table->string('pregunta4_opcion4');
            $table->string('pregunta4_opcion5');
            $table->string('pregunta5');
            $table->string('pregunta5_opcion1');
            $table->string('pregunta5_opcion2');
            $table->string('pregunta5_opcion3');
            $table->string('pregunta5_opcion4');
            $table->string('pregunta5_opcion5');
            $table->string('pregunta1_respuesta');
            $table->string('pregunta2_respuesta');
            $table->string('pregunta3_respuesta');
            $table->string('pregunta4_respuesta');
            $table->string('pregunta5_respuesta');
            $table->timestamps();
        });
        
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaluacion');
            $table->unsignedBigInteger('id_user');
            $table->string('oportunidad');
            $table->string('calificacion');
            $table->timestamps();
        });

        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->foreign('id_cuestionario')->references('id')->on('cuestionarios')->onDelete('cascade');
        });
    
        Schema::table('cuestionarios', function (Blueprint $table) {
            $table->foreign('id_evaluacion')->references('id')->on('evaluaciones')->onDelete('cascade');
        });
    
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->foreign('id_evaluacion')->references('id')->on('evaluaciones')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('calificaciones', 'cuestionarios', 'evaluaciones');
        //
    }
};