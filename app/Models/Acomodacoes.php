<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acomodacoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'descricao',
        'facilidades',
        'categoria',
        'valor',
        'qtd_pessoas',
        'ativo',
    ];
}
