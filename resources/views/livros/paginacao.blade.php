@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Biblioteca AdamRobo</h1>
  </div>
  <div>
    <form action="{{ route('livros.index') }}" method="get">  
      <input type="text" name="pesquisar" placeholder="Digite o nome do Livro" />
      <button>Pesquisar</button>
      <a type="button" href="{{route('cadastrar.livro')}}" class="btn btn-success float-end">
        Adicionar Novo Livro
      </a>
    </form>
    <h2>Livros</h2>
    <div class="table-responsive small mt-4">
      @if($getLivros->isEmpty())
      <p>Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getLivros as $livro)
              <tr>
                <td>{{ $livro->id }}</td>
                <td>{{ $livro->nome }}</td>
                <td>
                  <a type="button" href="{{ route('atualizar.livro', $livro->id) }}" class="btn btn-light float-end">
                    Editar
                  </a> 
                </td>
                <td>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <a type="button" onclick="deleteRegistroPaginacao('{{route('livro.delete')}}', {{$livro->id}})" class="btn btn-danger float-end">
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