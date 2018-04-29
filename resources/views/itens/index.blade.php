@extends('default')

@section('content')
<h3>Itens</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<label for="form">Pesquisar:</label>
		<form action="{{ route('itens.search') }} " method="GET" class="form-inline form-width"  id="form">
			
			<select class="form-control" name="select">
				<option value="predio">Prédio</option>
				<option value="sala">Sala</option>
				<option value="tombamento">Tombamento</option>
				<option value="descricao">Descrição</option>
			</select>
			<input type="text" name="search" class="form-control">
			<button type="submit" class="btn btn-success ">Pesquisar</button>
			
			@if(!strcmp(Route::currentRouteName(),'itens.search'))
				<a href="{{url()->previous()}}" class="btn btn-primary">Limpar</a>
			@endif
		</form>
		<h3>Itens</h3>
		<table class="table table-responsive table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Prédio</th>
					<th>Sala</th>
					<th>Tombamento</th>
					<th>Descrição</th>
				</tr>
			</thead>
			<tbody>
				@foreach($itens as $item)
				<tr>
					<td>{{ $item->id }}</td>
					<td>{{ $item->sala->predio }}</td>
					<td>{{ $item->sala->sala }}</td>
					<td>{{ $item->tombamento }}</td>
					<td class="shorten">{{ $item->descricao }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $itens->appends(request()->input())->links() }}
	</div>
</div>
@stop

@push('scripts')
<script src="/js/jquery.shorten.min.js" charset="utf-8"></script>
<script type="text/javascript">
	$('.shorten').shorten({
		moreText: 'extender',
		lessText: 'recolher',
		showChars: 90
	});
</script>
@endpush
