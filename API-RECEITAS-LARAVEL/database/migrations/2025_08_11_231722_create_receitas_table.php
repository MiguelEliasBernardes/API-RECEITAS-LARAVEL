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
        Schema::create('receitas', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('tempo_preparo_min');
            $table->double('dificuldade');
            $table->foreignUuid('id_categoria')->references('uuid')->on('categorias')->onDelete('cascade');
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
