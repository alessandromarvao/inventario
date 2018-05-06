@extends('default')

@section('content')
<h2>Prédios</h2>
<div class="panel panel-default">
	<div class="panel-body">
		<a href="{{ route('predio.create') }}" class="btn btn-sm btn-default btn-novo">Novo</a>
		<table class="table table-responsive table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Prédio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($predios as $predio)
				<tr>
					<td>{{ $predio->id }}</td>
					<td>{{ $predio->predio }}</td>
					<td><a href="{{ route('predio.show', $predio->id) }}" class="btn btn-sm btn-default glyphicon glyphicon-plus"></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $predios->appends(request()->input())->links() }}
	</div>
</div>
@stop
