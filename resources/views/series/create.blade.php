@extends('layout')

@section('titulo')
Adicionar Série
@endsection

@section('cabecalho')
Adicionar Série   
@endsection

@section('conteudo')
<form action="post">
    <div class="form-group">
        <label for="nome" class="">Nome</label>
        <input type="text" class="form-control" name="nome">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
@endsection