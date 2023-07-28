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
        Schema::create('enderecos_partidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_partida');
            $table->string('cep', 10)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('rua', 80)->nullable();
            $table->string('numero', 5)->nullable(); 
            $table->timestamps();

            //foreign keys
            $table->foreign('id_partida')->references('id')->on('partidas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos_partidas');
    }
};
