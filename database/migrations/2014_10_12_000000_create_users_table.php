<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('rfc')->unique();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombre');
            $table->string('email');
            $table->string('proyecto');
            $table->string('puesto');
            $table->string('descripcion_puesto');
            $table->string('curp')->nullable();
            $table->string('turno');
            $table->string('coordinacion');
            $table->string('area');
            $table->string('funcion');
            $table->string('tipo');
            $table->string('status');
            $table->string('observaciones');
            $table->string('password');
            $table->boolean('es_admin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};