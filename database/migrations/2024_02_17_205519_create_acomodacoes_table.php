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
        Schema::create('acomodacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->text('descricao');
            $table->text('facilidades');
            $table->enum('categoria',['Standard','Deluxe','Suíte','Familiar','Adaptado','Varanda']);
            $table->float('valor');
            $table->integer('qtd_pessoas');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acomodacoes');
    }
};
