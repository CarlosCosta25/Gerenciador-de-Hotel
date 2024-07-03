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

    <a type="submit" class="btn btn-warning" href="{{ route('hospedes.edit', $hospede->id) }}"><i class="bi bi-pencil-fill">
        </i> Editar</a>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" required readonly
            value="{{ $hospede->nome }}">
    </div>

    <div class="mb-3">
        <label for="sobrenome" class="form-label">Sobrenome:</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" required readonly
            value="{{ $hospede->sobrenome }}">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" required readonly
            value="{{ $hospede->cpf }}">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required readonly
            value="{{ $hospede->telefone }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required readonly
            value="{{ $hospede->email }}">
    </div>

    <div class="mb-3">
        <label for="sexo" class="form-label">Sexo:</label>
        <select class="form-select" id="sexo" name="sexo" required readonly>
            <option>{{ $hospede->sexo }}</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="estado_civil" class="form-label">Estado Civil:</label>
        <select class="form-select" id="estado_civil" name="estado_civil" required readonly>
            <option>{{ $hospede->estado_civil }}</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required
            value="{{ $hospede->data_nascimento }}" readonly>
    </div>

    <div class="mb-3">
        <label for="rua" class="form-label">Rua:</label>
        <input type="text" class="form-control" id="rua" name="rua" required readonly
            value="{{ $hospede->rua }}">
    </div>

    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" required readonly
            value="{{ $hospede->bairro }}">
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required readonly
            value="{{ $hospede->cidade }}">
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text" class="form-control" id="estado" name="estado" required readonly
            value="{{ $hospede->estado }}">
    </div>

    <div class="mb-3">
        <label for="numero_casa" class="form-label">Número da Casa:</label>
        <input type="number" class="form-control" id="numero_casa" name="numero_casa" required readonly
            value="{{ $hospede->numero_casa }}">
    </div>

    <!-- Não inclua um campo para 'ativo' no formulário -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
