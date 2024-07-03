@extends('main')
@section('content')

    <a href="{{ route('acomodacoes.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i> Nova Acomodação</a>
    @if (count($acomodacoes) == 0)
    <h1> Nenhuma acomodação cadastrado no momento</h1>
@else
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>NUMERO</th>
                <th>N° PESSOAS</th>
                <th>FACILIDADES</th>

                <!-- Adicione mais colunas conforme necessário -->
            </tr>
        </thead>
        <tbody>
            @foreach ($acomodacoes as $acomodacao)
                <tr>
                    <td>{{ $acomodacao->id }}</td>
                    <td><a href="{{ route('acomodacoes.show',$acomodacao->id) }}">{{ $acomodacao->numero }}</a></td>
                    <td>{{ $acomodacao->qtd_pessoas }}</td>
                    <td>{{ $acomodacao->facilidades }}</td>
                    <td><a href="{{ route('acomodacoes.edit', $acomodacao->id) }}" class="btn btn-warning"> <span
                                class="botao_editar"></span></a></td>
                    <td>
                        <form action="{{ route('acomodacoes.destroy', $acomodacao->id) }}" method="POST">
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