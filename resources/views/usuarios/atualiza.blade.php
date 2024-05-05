@extends('index')
@section('content')
<form class="form" method="POST" action="{{ route('atualizar.usuario', $getUsuario->id) }}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Biblioteca AdamRobo</h1>
    </div>
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" value="{{ isset($getUsuario->nome) ? $getUsuario->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror">
        @if($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        @endif
        <label class="form-label">CPF:</label>
        <input type="text" name="cpf" value="{{ isset($getUsuario->cpf) ? $getUsuario->cpf : old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror">
        @if($errors->has('cpf'))
            <div class="invalid-feedback">{{ $errors->first('cpf') }}</div>
        @endif
    </div>
   
   
    <button type="submit" class="btn btn-success">Atualizar</button>
    </form>

  @endsection