@extends('default')

@section('content')
<h3>Item <small>\ Exibir</small></h3>
<div class="panel panel-default">
    <div class="panel-body">
        <a href="/item" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-default">Editar</a>
        <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-sm btn-info">Excluir</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Prédio</th>
            <th>Sala</th>
            <th>Tombamento</th>
            <th>Descrição</th>
            <th>Situação</th>
            <th>Estado</th>
            <th>Carga Contábil</th>
            <th>Data de Entrada</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->sala->predio }}</td>
            <td>{{ $item->sala->sala }}</td>
            <td>{{ $item->tombamento }}</td>
            <td>{{ $item->descricao }}</td>
            <td>{{ $item->situacao }}</td>
            <td>{{ $item->estado }}</td>
            <td>{{ $item->carga_contabil }}</td>
            <td>{{ date_format(date_create(explode(' ', $item->data_entrada)[0]), 'd/m/Y') }}</td>
            <td>{{ $item->status }}</td>
        </tr>
    </tbody>
</table>
@stop