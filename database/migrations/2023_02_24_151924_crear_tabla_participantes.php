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
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_curso');
            $table->string('nombre_curso');
            $table->string('rfc_participante')->nullable();
            $table->string('nombre_participante');
            $table->string('email_participante');
            $table->string('ubicacion');
            $table->string('fecha_de_inicio');
            $table->string('fecha_de_terminacion');
            $table->string('valor_curricular');
            $table->string('tipo');
            $table->string('img')->nullable();
            $table->timestamp('fecha_de_registro')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('participantes', function (Blueprint $table) {
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
