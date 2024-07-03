<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_entrada',
        'data_saida',
        'hora_entrada',
        'hora_saida',
        'hospede_id',
        'acomodacao_id',
        'status',
    ];
}
