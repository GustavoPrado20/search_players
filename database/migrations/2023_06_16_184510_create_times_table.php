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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cep', 10)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('rua', 80)->nullable();
            $table->string('numero', 5)->nullable();
            $table->string('brasao_time');
            $table->integer('esporte');
            $table->unsignedBigInteger('id_dono');
            $table->integer('pontos');
            $table->string('lema');
            $table->timestamps();

            //foreign keys
            $table->foreign('id_dono')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
