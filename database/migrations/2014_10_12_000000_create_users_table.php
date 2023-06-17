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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_usuario');
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cep_usuario', 10)->nullable();
            $table->string('estado_usuario', 2)->nullable();
            $table->string('cidade_usuario', 80)->nullable();
            $table->string('bairro_usuario', 80)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('foto_usuario')->nullable();
            $table->string('sexo_usuario', 10)->nullable();
            $table->string('sobre')->nullable();
            $table->string('site')->nullable();
            $table->integer('esporte')->nullable();
            $table->string('banner_usuario')->nullable();
            $table->decimal('preco', 10, 2)->nullable();
            $table->integer('pontos')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
