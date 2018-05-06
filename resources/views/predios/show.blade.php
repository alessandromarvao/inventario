@extends('default')

@section('content')

<h2>{!! $predio->predio !!} <small>\ Exibir</small></h2>
<div class="panel panel-default">
    <div class="panel-body">
        <a href="/predio" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('predio.edit', $predio->id) }}" class="btn btn-sm btn-default">Editar</a>
		<form class="form-horizontal" action="{{ route('predio.destroy', $predio->id) }}" method="post" style="display: inline-block">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE" />
        	<input type="submit" value="Excluir" class="btn btn-sm btn-info" >
		</form>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Prédio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $predio->id }}</td>
            <td>{{ $predio->predio }}</td>
        </tr>
    </tbody>
</table>
@stop
