@extends('main')
@section('content')
    <form action="{{ route('hospedes.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
        </div>

        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome:</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00"
                oninput="mascaraCPF(this)" maxlength="14">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000"
                oninput="mascaraTelefone(this)" maxlength="14" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado_civil" class="form-label">Estado Civil:</label>
            <select class="form-select" id="estado_civil" name="estado_civil" required>
                <option value="Solteiro(a)">Solteiro(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Divorciado(a)">Divorciado(a)</option>
                <option value="Viúvo(a)">Viúvo(a)</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" class="form-control" id="rua" name="rua" required>
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>

        <div class="mb-3">
            <label for="numero_casa" class="form-label">Número da Casa:</label>
            <input type="number" class="form-control" id="numero_casa" name="numero_casa" required>
        </div>


        <button type="submit" class="btn btn-primary">Cadastrar Hóspede</button>
    </form>
@endsection
