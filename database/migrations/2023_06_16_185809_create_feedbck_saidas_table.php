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
        Schema::create('feedbck_saidas', function (Blueprint $table) {
            $table->id();
            $table->unsinedBigInteger('id_usuario');
            $table->string('nome');
            $table->string('email');
            $table->string('opiniao');
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
        Schema::dropIfExists('feedbck_saidas');
    }
};
