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
        Schema::create('carta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso');
            $table->string('carta')->nullable();
            $table->timestamps();
        });

        Schema::table('carta', function (Blueprint $table) {
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carta');
    }
};