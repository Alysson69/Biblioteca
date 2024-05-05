@extends('index')
@section('content')
<style>
    .erroData{
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: var(--bs-form-invalid-color);
    }
</style>
<form class="form" method="POST" action="{{ route('cadastrar.aluguel') }}">
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Biblioteca AdamRobo</h1>
    </div>
    <div class="mb-3">
        <label class="form-label">Nome do Usuario:</label>
        <select name="usuario_id" class="form-select" aria-label="Default select example">
            <option selected>Selecione o usuário</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                
            @endforeach
        </select>

        <label class="form-label">Nome do Livro:</label>
        <select name="livro_id" class="form-select" aria-label="Default select example">
            <option selected>Selecione o livro</option>
            @foreach ($livros as $livro)
                <option value="{{ $livro->id }}">{{ $livro->nome }}</option>
                
            @endforeach
        </select>
        
        <label class="form-label">Data de Inicio:</label>
        <input type="date" name="data_inicial" value="" class="form-control @error('data_inicial') is-invalid @enderror">
        @if(isset($errorData))
            <div style="" class="erroData">{{ $errorData }}</div>
        @endif
        @if($errors->has('data_inicial'))
            <div class="invalid-feedback">{{ $errors->first('data_inicial') }}</div>
        @endif
        
        <label class="form-label">Data de  Devolução:</label>
        <input type="date" name="data_final" value="" class="form-control @error('data_final') is-invalid @enderror">
        @if(isset($errorData))
            <div class="erroData">{{ $errorData }}</div>
        @endif
        @if($errors->has('data_final'))
            <div class="invalid-feedback">{{ $errors->first('data_final') }}</div>
        @endif

    </div>
      
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection