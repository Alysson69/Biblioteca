@extends('index')
@section('content')
<form class="form" method="POST" action="{{ route('atualizar.aluguel', $getAluguel->id) }}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Biblioteca AdamRobo</h1>
    </div>
    <div class="mb-3">
        <label class="form-label">Nome do Usuario:</label>
        <select class="form-select" aria-label="Default select example">
            <option selected value="{{ $getAluguel->usuario_id }}" > {{$getAluguel->usuario->nome}} </option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                
            @endforeach
        </select>

        <label class="form-label">Nome do Livro:</label>
        <select class="form-select" aria-label="Default select example">
            <option selected value="{{ $getAluguel->livro_id }}" > {{$getAluguel->livro->nome}} </option>
            @foreach ($livros as $livro)
                <option value="{{ $livro->id }}">{{ $livro->nome }}</option>
            @endforeach
        </select>
        
        <label class="form-label">Data de Inicio:</label>
        <input type="date" name="data_inicial"  value="{{ isset($getAluguel->data_inicial) ? $getAluguel->data_inicial : old('data_inicial') }}" class="form-control @error('data_inicial') is-invalid @enderror">
        @if($errors->has('data_inicial'))
            <div class="invalid-feedback">{{ $errors->first('data_inicial') }}</div>
        @endif
        
        <label class="form-label">Data de  Devolução:</label>
        <input type="date" name="data_final" value="{{ isset($getAluguel->data_final) ? $getAluguel->data_final : old('data_final') }}" class="form-control @error('data_final') is-invalid @enderror">
        @if($errors->has('data_final'))
            <div class="invalid-feedback">{{ $errors->first('data_final') }}</div>
        @endif

    </div>
      
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection