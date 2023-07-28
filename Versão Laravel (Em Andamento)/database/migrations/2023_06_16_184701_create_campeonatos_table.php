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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('id_organisador');
            $table->string('premiacao');
            $table->decimal('taxa_inscricao', 10, 2);
            $table->integer('numero_times');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('tipo');
            $table->integer('esporte');
            $table->string('logo');
            $table->timestamps();

            //Foreign keys
            $table->foreign('id_organisador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeonatos');
    }
};
