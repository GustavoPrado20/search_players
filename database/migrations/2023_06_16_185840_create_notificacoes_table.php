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
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario_1');
            $table->unsignedBigInteger('id_usuario_2');
            $table->string('notificacao')->nullable();
            $table->integer('status')->default(0);
            $table->string('link')->nullble();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_usuario_1')->references('id')->on('users');
            $table->foreign('id_usuario_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
