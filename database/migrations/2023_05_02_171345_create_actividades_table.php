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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_ponente');
            $table->string('archivo1')->nullable();
            $table->string('archivo2')->nullable();
            $table->string('archivo3')->nullable();
            $table->string('status')->nullable();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::table('actividades', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('id_ponente')->references('id')->on('ponentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};