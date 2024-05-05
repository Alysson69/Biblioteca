@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Biblioteca AdamRobo</h1>
  </div>
  <div>
    <form action="{{ route('usuarios.index') }}" method="get">  
      <input type="text" name="pesquisar" placeholder="Digite o nome do Usuario" />
      <button>Pesquisar</button>
      <a type="button" href="{{route('cadastrar.usuario')}}" class="btn btn-success float-end">
        Adicionar Novo Usuario
      </a>
    </form>
    <h2>Usuarios</h2>
    <div class="table-responsive small mt-4">
      @if($getUsuarios->isEmpty())
      <p>Não existe dados</p>
      @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getUsuarios as $usuario)
              <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->cpf }}</td>
                <td>
                  <a type="button" href="{{ route('atualizar.usuario', $usuario->id) }}" class="btn btn-light float-end">
                    Editar
                  </a> 
                </td>
                <td>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <a type="button" onclick="deleteRegistroPaginacao('{{route('usuario.delete')}}', {{$usuario->id}})" class="btn btn-danger float-end">
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