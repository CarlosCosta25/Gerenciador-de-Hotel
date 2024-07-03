<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'telefone',
        'email',
        'sexo',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero_casa',
        'estado_civil',
        'data_nascimento',
        'ativo',
    ];
}
