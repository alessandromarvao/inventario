@extends('default')

@section('content')

@php
$nome = explode('-', $sala->sala);
$texto = ucfirst(strtolower($nome[0]));
if(!empty($nome[1])){
    $texto .= ' - ' . $nome[1];
}
@endphp

<h3>{!! $texto !!} <small>\ Exibir</small></h3>
<div class="panel panel-default">
    <div class="panel-body">
        <a href="/sala" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('sala.edit', $sala->id) }}" class="btn btn-sm btn-default">Editar</a>
        <a href="{{ route('sala.destroy', $sala->id) }}" class="btn btn-sm btn-info">Excluir</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Prédio</th>
            <th>Sala</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $sala->id }}</td>
            <td>{{ $sala->predio }}</td>
            <td>{{ $sala->sala }}</td>
        </tr>
    </tbody>
</table>
@stop