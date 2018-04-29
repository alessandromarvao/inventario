@extends('default')

@section('content')
<h3>Salas</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<label for="form">Pesquisar por:</label>
        <form action="{{ route('salas.search') }}"  method="GET" class="form-inline form-width"id="form">
            <select class="form-control" name="select">
				<option value="predio">Prédio</option>
				<option value="sala">Sala</option>
			</select>
			<input type="text" name="search" class="form-control">
			<button type="submit"  class="btn btn-success ">Pesquisar</button>
		</form>
		<h3>Salas</h3>
		<table class="table table-responsive table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Prédio</th>
					<th>Sala</th>
				</tr>
			</thead>
			<tbody>
				@foreach($salas as $sala)
				<tr>
					<td>{{ $sala->id }}</td>
					<td>{{ $sala->predio }}</td>
					<td>{{ $sala->sala }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $salas->appends(request()->input())->links() }}
	</div>
</div>
@stop