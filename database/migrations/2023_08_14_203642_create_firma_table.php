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
        Schema::create('firmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaladq');
            $table->unsignedBigInteger('id_otp');
            $table->timestamps();
            $table->foreign('id_evaladq')->references('id')->on('evals_adq')->onDelete('cascade');
            $table->foreign('id_otp')->references('id')->on('otp')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firmas');
    }
};