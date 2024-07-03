@extends('main')
@section('content')

    <form action="{{ route('reservas.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="hospede_id" class="form-label">Hóspede:</label>
            <select class="form-select" id="hospede_id" name="hospede_id" required>
                @foreach ($hospedes as $hospede)
                    <option value="{{ $hospede->id }} ">
                        {{ $hospede->nome }} {{ $hospede->sobrenome }}
                    </option>
                @endforeach
            </select>
        </div>

            <div class="mb-3">
                <label for="acomodacao_id" class="form-label">Número da Acomodação:</label>
                <select class="form-select" id="acomodacao_id" name="acomodacao_id" required>
                    @foreach ($acomodacoes as $acomodacao)
                        <option value="{{ $acomodacao->id }}">
                            {{ $acomodacao->numero }}
                        </option>
                    @endforeach
                </select>
            </div>
        
        <div class="mb-3">
            <label for="data_entrada" class="form-label">Data de Entrada:</label>
            <input type="date" class="form-control" id="data_entrada" name="data_entrada" required>
        </div>
        <div class="mb-3">
            <label for="data_saida" class="form-label">Data de Saída:</label>
            <input type="date" class="form-control" id="data_saida" name="data_saida" required>
        </div>

        <div class="mb-3">
            <label for="hora_entrada" class="form-label">Hora de Entrada:</label>
            <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" required>
        </div>

        <div class="mb-3">
            <label for="hora_saida" class="form-label">Hora de Saída:</label>
            <input type="time" class="form-control" id="hora_saida" name="hora_saida" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label"> Status Atual:</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Em andamento">Em andamento</option>
                <option value="Pendente">Pendente</option>
                <option value="Confirmada">Confirmada</option>
                <option value="Cancelada">Cancelada</option>
                <option value="Concluída">Concluída</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Reservar</button>

    </form>
@endsection
