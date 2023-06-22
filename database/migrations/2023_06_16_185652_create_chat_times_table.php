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
        Schema::create('chat_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_time');
            $table->unsignedBigInteger('id_usuario');
            $table->string('mensagem');
            $table->timestamps();

            //foreign keys
            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_times');
    }
};
