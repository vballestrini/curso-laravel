@extends('layout')

@section('titulo')
Adicionar Série
@endsection

@section('cabecalho')
Adicionar Série   
@endsection


@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas" class="">Nº de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas">
        </div>
        <div class="col col-2">
            <label for="ep_temporada" class="">Episódios</label>
            <input type="number" class="form-control" name="ep_temporada">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
</form>

@endsection