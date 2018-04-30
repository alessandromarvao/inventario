@extends('default')

@section('content')
<h3>Item</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<label for="form">Pesquisar:</label>
		<form action="{{ route('item.search') }} " method="POST" class="form-inline form-width"  id="form">
			{!! csrf_field() !!}
			<select class="form-control" name="select">
				<option value="predio">Prédio</option>
				<option value="sala">Sala</option>
				<option value="tombamento">Tombamento</option>
				<option value="descricao">Descrição</option>
			</select>
			<input type="text" name="search" class="form-control">
			<button type="submit" class="btn btn-success ">Pesquisar</button>
			
			@if(!strcmp(Route::currentRouteName(),'item.search'))
			<a href="/item" class="btn btn-default">Limpar</a>
			@endif
		</form>
		<a href="{{ route('item.create') }}" class="btn btn-sm btn-default btn-novo">Novo</a>
		<table class="table table-responsive table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Prédio</th>
					<th>Sala</th>
					<th>Tombamento</th>
					<th>Descrição</th>
					<th></th>
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
					<td><a href="{{route('item.show', $item->id)}}" class="btn btn-default btn-xs glyphicon glyphicon-plus"></a></td>
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
		showChars: 60
	});
</script>
@endpush
