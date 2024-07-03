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

<a type="submit" class="btn btn-warning" href="{{ route('acomodacoes.edit', $acomodacao->id) }}"><i class="bi bi-pencil-fill">
    </i> Editar</a>
        <div class="mb-3">
            <label for="numero" class="form-label">Número:</label>
            <p type="number" class="form-control" id="numero" name="numero">{{$acomodacao->numero}}</p>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <p class="form-control" id="descricao" name="descricao" rows="3">{{$acomodacao->descricao}}</p>
        </div>
        <div class="mb-3">
            <label for="facilidades" class="form-label">Facilidades:</label>
            <p class="form-control" id="facilidades" name="facilidades" rows="3" >{{$acomodacao->facilidades}}</p>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <p  class="form-control" id="categoria" name="categoria">{{$acomodacao->categoria}}</p>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor da Diária:</label>
            <p class="form-control" id="valor" name="valor">{{$acomodacao->valor}}</p>
        </div>
        <div class="mb-3">
            <label for="qtd_pessoas" class="form-label">Quantidade de Pessoas:</label>
            <p class="form-control" id="qtd_pessoas" name="qtd_pessoas" >{{$acomodacao->qtd_pessoas}}</p>
        </div>
@endsection
