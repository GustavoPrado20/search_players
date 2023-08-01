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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('cep', 10)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
