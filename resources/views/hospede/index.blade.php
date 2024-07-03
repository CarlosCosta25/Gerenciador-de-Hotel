@extends('main')
@section('content')

     <a href="{{ route('hospedes.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i> Novo Hóspede</a>
     @if (count($hospedes) == 0 )
         <h1> Nenhum hóspede cadastrado no momento</h1>
     @else
         <table class="table mt-3">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Nome</th>
                     <th>CPF</th>
                     <th>EDITAR</th>
                     <th>EXCLUIR</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($hospedes as $hospede)
                     <tr>
                         <td>{{ $hospede->id }}</td>
                         <td><a href="{{ route('hospedes.show', $hospede->id) }}">{{ $hospede->nome }} {{ $hospede->sobrenome }}</a>
                         </td>
                         <td>{{ $hospede->cpf }}</td>
                         <td>
                             <a href="{{ route('hospedes.edit', $hospede->id) }}" class="btn btn-warning">
                                 <span class="botao_editar"></span>
                             </a>
                         </td>
                         <td>
                             <form action="{{ route('hospedes.destroy', $hospede->id) }}" method="POST">
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
