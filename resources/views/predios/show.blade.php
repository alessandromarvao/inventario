@extends('default')

@section('content')

<div class="panel panel-default central central">
    <div class="panel-body">
        <h2>Exibir <small> - {!! $predio->predio !!}</small></h2>
        <hr>
        <a href="/predio" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('predio.edit', $predio->id) }}" class="btn btn-sm btn-default">Editar</a>
		<form class="form-horizontal" action="{{ route('predio.destroy', $predio->id) }}" method="post" style="display: inline-block">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE" />
        	<input type="submit" value="Excluir" class="btn btn-sm btn-info" >
		</form>
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
    </div>
</div>
@stop
