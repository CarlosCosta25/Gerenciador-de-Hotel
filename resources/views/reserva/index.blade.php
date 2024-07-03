@extends('main')
@section('content')
    <a href="{{ route('reservas.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle-dotted"> </i>
        Nova Reserva
    </a>
    @if (count($reservas) == 0)
        <h1> Nenhuma reserva cadastrado no momento</h1>
    @else
 
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th> ENTRADA</th>
                    <th>SAÍDA</th>
                    <th>STATUS</th>
                    <th>EDITAR</th>
                    <th>EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>
                            <a href="{{ route('reservas.show', $reserva->id) }}">{{ $reserva->nome_hospede }}</a>
                        </td>
                        <td >{{$reserva->hospede_cpf}}</td>
                        <td>{{ $reserva->data_entrada }} {{ $reserva->hora_entrada }}</td>
                        <td>{{ $reserva->data_saida }} {{ $reserva->hora_saida }}</td>
                        <td>{{ $reserva->status }}</td>
                        <td>
                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning">
                                <span class="botao_editar"></span>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">
                                    <span class="botao_apagar"></span></button>
                            </form>

                        </td>
                        <!-- Adicione mais colunas conforme necessário -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


@endsection
