@extends('default')

@section('content')
<h2>Item <small>\ Exibir</small></h2>
<div class="panel panel-default">
    <div class="panel-body">
        <a href="/sala" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('sala.edit', $sala->id) }}" class="btn btn-sm btn-default">Editar</a>
        {{-- <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-sm btn-info">Excluir</a> --}}
        {{--
        <form class="form-horizontal" action="{{ route('sala.destroy', $sala->id) }}" method="post" style="display: inline-block">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE" />
        	<input type="submit" value="Excluir" class="btn btn-sm btn-info" >
        </form>
        --}}
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
                <td>{{ $sala->predio->predio }}</td>
                <td>{{ $sala->sala }}</td>
            </tr>
        </tbody>
    </table>
</div>
@stop