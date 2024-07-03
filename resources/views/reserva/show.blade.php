@extends('main')
@section('content')
    <style>
        .btn-warning {
            text-align: end;
            margin-top: 5px;
            width: auto;
            height: auto;
            justify-content: flex-end;
            margin-left: 84%;
            overflow: visible;
            align-items: center;

        }
    </style>

    <a type="submit" class="btn btn-warning" href="{{ route('reservas.edit', $reserva->id) }}"><i class="bi bi-pencil-fill"> </i>  Editar</a>
    <div class="mb-3">
        <label for="nome_hospede" class="form-label">Hóspede:</label>
        <p type="text" class="form-control" id="nome_hospede" name="nome_hospede">{{ $reserva->nome_hospede }}</p>
    </div>
    <div class="mb-3">
        <label for="hospede_cpf" class="form-label">CPF do Hóspede:</label>
        <p type="text" class="form-control" id="hospede_cpf" name="hospede_cpf">{{ $reserva->hospede_cpf }}</p>
    </div>
    <div class="mb-3">
        <label for="numero_quarto" class="form-label">Numero da Acomodação:</label>
        <p type="text" class="form-control" id="numero_quarto" name="numero_quarto">{{ $reserva->numero_quarto }}</p>
    </div>
    <div class="mb-3">
        <label for="check_in" class="form-label">check-in:</label>
        <p type="text" class="form-control" id="check_in" name="check_in">{{ $reserva->data_entrada }}
            {{ $reserva->hora_entrada }}</p>
    </div>
    <div class="mb-3">
        <label for="check_out" class="form-label">check-out:</label>
        <p type="text" class="form-control" id="check_out" name="check_out">{{ $reserva->data_saida }}
            {{ $reserva->hora_saida }}</p>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <p type="text" class="form-control" id="status" name="status">{{ $reserva->status }}</p>
    </div>
@endsection
