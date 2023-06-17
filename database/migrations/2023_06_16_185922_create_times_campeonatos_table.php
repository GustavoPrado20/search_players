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
        Schema::create('times_campeonatos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_campeonato');
            $table->unsignedBigInteger('id_time');
            $table->integer('colocacao')->nullable();
            $table->integer('pontos')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
            $table->foreign('id_time')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times_campeonatos');
    }
};
