@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Biblioteca AdamRobo</h1>
  </div>
  <div>
    <h2>Alugueis</h2>
    <div class="table-responsive small mt-4">
      @if($getAlugueis->isEmpty())
      <p>Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome do Usuario</th>
              <th scope="col">Nome do Livro</th>
              <th scope="col">CPF do Usuario</th>
              <th scope="col">Data de inicio</th>
              <th scope="col">Data de devolução</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getAlugueis as $aluguel)
              <tr>
                <td>{{ $aluguel->id }}</td>
                <td>{{ $aluguel->usuario->nome }}</td>
                <td>{{ $aluguel->livro->nome }}</td>
                <td>{{ $aluguel->usuario->cpf }}</td>
                <td>{{ $aluguel->data_inicial }}</td>
                <td>{{ $aluguel->data_final }}</td>
                <td>
                  <a type="button" href="{{ route('atualizar.aluguel', $aluguel->id) }}" class="btn btn-light float-end">
                    Editar
                  </a> 
                </td>
                <td>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <a type="button" onclick="deleteRegistroPaginacao('{{route('aluguel.delete')}}', {{$aluguel->id}})" class="btn btn-danger float-end">
                    Excluir
                  </a> 
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection