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
        Schema::create('enderecos_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_time');
            $table->string('cep', 10)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('rua', 80)->nullable();
            $table->string('numero', 5)->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_time')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco_times');
    }
};
