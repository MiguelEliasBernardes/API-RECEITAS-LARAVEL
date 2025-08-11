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
        Schema::create('etapas_preparos', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->foreignUuid('id_receita')->references('uuid')->on('receitas')->onDelete('cascade');
            $table->integer('ordem');
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etapas_preparos');
    }
};
