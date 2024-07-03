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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->time('hora_entrada');
            $table->time('hora_saida');
            $table->unsignedBigInteger('hospede_id');
            $table->unsignedBigInteger('acomodacao_id');
            $table->enum('status', ['Em andamento','Pendente', 'Confirmada', 'Cancelada', 'Concluída']);;
            $table->timestamps();

            $table->foreign('hospede_id')->references('id')->on('hospedes')->onDelete('cascade');
            $table->foreign('acomodacao_id')->references('id')->on('acomodacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
