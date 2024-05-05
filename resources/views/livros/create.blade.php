@extends('index')
@section('content')
<form class="form" method="POST" action="{{ route('cadastrar.livro') }}">
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Biblioteca AdamRobo</h1>
    </div>
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror">
        @if($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        @endif
    </div>
   
   
    <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>

  @endsection