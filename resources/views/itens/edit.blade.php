@extends('default')

@section('content')
<h3>Item <small>\ Editar</small></h3>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="/item" class="btn btn-xs default">Voltar</a>
        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-xs default">Editar</a>
        <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-xs default">Excluir</a>
    </div>
</div>
{!! csrf_field() !!}
@stop