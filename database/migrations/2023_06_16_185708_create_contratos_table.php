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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jogador');
            $table->unsignedBigInteger('id_contratante');
            $table->unsignedBigInteger('id_time');
            $table->decimal('preco', 10, 2);
            $table->string('status_contrato');
            $table->integer('tipo_contrato');
            $table->string('posicao')->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_jogador')->references('id')->on('users');
            $table->foreign('id_contratante')->references('id')->on('users');
            $table->foreign('id_time')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
