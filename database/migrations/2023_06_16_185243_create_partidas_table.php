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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->string('resultado')->nullable();
            $table->unsignedBigInteger('id_time_1');
            $table->unsignedBigInteger('id_time_2');
            $table->unsignedBigInteger('id_analisador')->nullable();
            $table->unsignedBigInteger('id_campeonato')->nullable();
            $table->integer('esporte');
            $table->timestamps();

            //foreign keys
            $table->foreign('id_time_1')->references('id')->on('times');
            $table->foreign('id_time_2')->references('id')->on('times');
            $table->foreign('id_analisador')->references('id')->on('users');
            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
