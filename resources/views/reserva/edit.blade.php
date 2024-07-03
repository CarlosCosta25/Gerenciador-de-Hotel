@extends('main')
@section('content')
    <form action="/reservas/{{ $reserva->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hospede_id" class="form-label">Hóspede:</label>
            <select class="form-select" id="hospede_id" name="hospede_id" required>
                @foreach ($hospedes as $hospede)
                    <option value="{{ $hospede->id }}" {{ $hospede->id === $reserva->hospede_id ? 'selected' : '' }}>
                        {{ $hospede->nome }} {{ $hospede->sobrenome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="acomodacao_id" class="form-label"> Numero da Acomodação:</label>
            <select class="form-select" id="acomodacao_id" name="acomodacao_id" required>
                @foreach ($acomodacoes as $acomodacao)
                    <option value="{{ $acomodacao->id }}"
                        {{ $acomodacao->id === $reserva->acomodacao_id ? 'selected' : '' }}>
                        {{ $acomodacao->numero }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data_entrada" class="form-label">Data de Entrada:</label>
            <input type="date" class="form-control" id="data_entrada" name="data_entrada" required
                value= "{{ old('data_entrada', $reserva->data_entrada ?? '')}}">
        </div>
        
        <div class="mb-3">
            <label for="data_saida" class="form-label">Data de Saída:</label>
            <input type="date" class="form-control" id="data_saida" name="data_saida" required
                value= "{{ old('data_saida', $reserva->data_saida ?? '')}}">
        </div>

        <div class="mb-3">
            <label for="hora_entrada" class="form-label">Hora de Entrada:</label>
            <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" required
            value ="{{ $reserva->hora_entrada}}">
        </div>
    
        <div class="mb-3">
            <label for="hora_saida" class="form-label">Hora de Saída:</label>
            <input type="time" class="form-control" id="hora_saida" name="hora_saida" required
            value ="{{ $reserva->hora_saida}}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label"> Status Atual:</label>
             <select class="form-select" id="status" name="status" required>
                @foreach ($opcaoStatus as $status)
                <option value="{{ $status }}" {{ $status === $reserva->status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
             </select>
        </div>
    
        
        <button type="submit" class="btn btn-primary">Editar Reserva</button>

    </form>
@endsection
