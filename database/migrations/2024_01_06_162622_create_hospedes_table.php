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
        Schema::create('hospedes', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('nome',50);
                $table->string('sobrenome',50);
                $table->string('cpf',11)->unique();
                $table->string('telefone',11);
                $table->string('email')->unique();
                $table->enum('sexo', ['Masculino', 'Feminino', 'Outro']);
                $table->string('rua');
                $table->string('bairro');
                $table->string('cidade');
                $table->string('estado');
                $table->integer('numero_casa');
                $table->enum('estado_civil', ['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)', 'Outro']);
                $table->date('data_nascimento');
                $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospedes');
    }
};
