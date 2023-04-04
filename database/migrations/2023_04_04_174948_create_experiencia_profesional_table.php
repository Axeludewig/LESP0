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
        Schema::create('experiencia_profesional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('puesto1');
            $table->string('experiencia1');
            $table->string('periodo1');
            $table->string('puesto2');
            $table->string('experiencia2');
            $table->string('periodo2');
            $table->string('puesto3');
            $table->string('experiencia3');
            $table->string('periodo3');
            $table->string('puesto4');
            $table->string('experiencia4');
            $table->string('periodo4');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_profesional');
    }
};