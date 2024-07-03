@extends('main')
@section('content')
    <form action="/hospedes/{{ $hospede->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <span for="nome" class="form-label">Nome:</span>
            <input type="text" class="form-control" id="nome" name="nome" required value="{{ $hospede->nome }}">

        </div>

        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome:</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" required value="{{$hospede->sobrenome}}">

        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $hospede->cpf }}"
                autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>            <input type="text" class="form-control" id="telefone" name="telefone" required
                value="{{ $hospede->telefone }}" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $hospede->email }}"
                autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select class="form-select" id="sexo" name="sexo" required>
                @foreach ($opcaoSexo as $sex)
                    <option value="{{ $sex }}" {{ $sex === $hospede->sexo ? 'selected' : '' }}>
                        {{ $sex }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estado_civil" class="form-label">Estado Civil:</label>
            <select class="form-select" id="estado_civil" name="estado_civil" required autocomplete="off">
                @foreach ($opcaoEstado as $estado)
                    <option value="{{ $estado }}" {{ $estado === $hospede->estado_civil ? 'selected' : '' }}>
                        {{ $estado }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required
                value="{{ $hospede->data_nascimento }}" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" class="form-control" id="rua" name="rua" required value="{{ $hospede->rua }}"
                autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required
                value="{{ $hospede->bairro }}" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required
                value="{{ $hospede->cidade }} " autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" class="form-control" id="estado" name="estado" required
                value="{{ $hospede->estado }}" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="numero_casa" class="form-label">Número da Casa:</label>
            <input type="number" class="form-control" id="numero_casa" name="numero_casa" required
                value="{{ $hospede->numero_casa }}" autocomplete="off">
        </div>

        <!-- Não inclua um campo para 'ativo' no formulário -->

        <button type="submit" class="btn btn-primary">Editar Hóspede</button>
    </form>
@endsection
