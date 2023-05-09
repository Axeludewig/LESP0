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
            $table->string('puesto1')->nullable();
            $table->string('experiencia1')->nullable();
            $table->string('periodo1')->nullable();
            $table->string('puesto2')->nullable();
            $table->string('experiencia2')->nullable();
            $table->string('periodo2')->nullable();
            $table->string('puesto3')->nullable();
            $table->string('experiencia3')->nullable();
            $table->string('periodo3')->nullable();
            $table->string('puesto4')->nullable();
            $table->string('experiencia4')->nullable();
            $table->string('periodo4')->nullable();
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