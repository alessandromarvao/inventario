@extends('default')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<h2>Salas</h2>
		<hr>
		<label for="form">Pesquisar por:</label>
        <form action="{{ route('sala.search') }}"  method="GET" class="form-inline form-width"id="form">
			{{-- {!! csrf_field() !!} --}}
			<select class="form-control" name="select">
				<option value="predio">Prédio</option>
				<option value="sala">Sala</option>
				<option value="visitada">Foi visitada?</option>
			</select>
			<input type="text" name="search" class="form-control">
			<button type="submit"  class="btn btn-success ">Pesquisar</button>
			@if(!strcmp(Route::currentRouteName(),'sala.search'))
				<a href="/sala" class="btn btn-primary">Limpar</a>
			@endif
		</form>
		<a href="{{ route('sala.create') }}" class="btn btn-sm btn-default btn-novo">Novo</a>
		<table class="table table-responsive table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Prédio:</th>
					<th>Sala:</th>
					<th>Visitada em:</th>
					<th>Exibir</th>
				</tr>
			</thead>
			<tbody>
				@foreach($salas as $sala)
				<tr>
					<td>{{ $sala->id }}</td>
					@if(!empty($sala->predio->predio))
						<td>{{ $sala->predio->predio }}</td>
					@else 
						<td>{{ $sala->predio }}</td>
					@endif
					<td>{{ $sala->sala }}</td>
					<td>
						@if(!empty($sala->visitada_em))
							{{ date('d/m/Y', strtotime($sala->visitada_em)) ?? '' }}
						@endif 
					</td>
					<td><a href="{{ route('sala.show', $sala->id) }}" class="btn btn-xs btn-default glyphicon glyphicon-plus"></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $salas->appends(request()->input())->links() }}
	</div>
</div>
@stop
