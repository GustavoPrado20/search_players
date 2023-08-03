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
        Schema::create('jogadores_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jogador');
            $table->unsignedBigInteger('id_contrado');
            $table->unsignedBigInteger('id_time');
            $table->string('posicao');
            $table->string('esporte');
            $table->timestamps();

            //foreign keys
            $table->foreign('id_jogador')->references('id')->on('users');
            $table->foreign('id_contrado')->references('id')->on('contratos');
            $table->foreign('id_time')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogadores_times');
    }
};
