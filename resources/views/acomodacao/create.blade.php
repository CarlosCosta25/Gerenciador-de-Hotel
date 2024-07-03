@extends('main')
@section('content')
<form action="{{ route('acomodacoes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="numero" class="form-label">Número:</label>
        <input type="number" class="form-control" id="numero" name="numero" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="facilidades" class="form-label">Facilidades:</label>
        <textarea class="form-control" id="facilidades" name="facilidades" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria:</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <option value="Standard">Standard</option>
            <option value="Deluxe">Deluxe</option>
            <option value="Suíte">Suíte</option>
            <option value="Familiar">Familiar</option>
            <option value="Adaptado">Adaptado</option>
            <option value="Varanda">Varanda</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor da Diária:</label>
        <input type="text" class="form-control" id="valor" name="valor" required>
    </div>
    <div class="mb-3">
        <label for="qtd_pessoas" class="form-label">Quantidade de Pessoas:</label>
        <input type="number" class="form-control" id="qtd_pessoas" name="qtd_pessoas" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
