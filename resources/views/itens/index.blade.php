@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
		<h2>Item</h2>
		<hr>
		<label for="form">Pesquisar:</label>
		<form action="{{ route('item.search') }} " method="GET" class="form-inline form-width"  id="form">
			{{-- {!! csrf_field() !!} --}}
			<select class="form-control" name="select">
				<option value="predio">Prédio</option>
				<option value="sala">Sala</option>
				<option value="tombamento">Tombamento</option>
				<option value="descricao">Descrição</option>
				<option value="particular">Item particular?</option>
				<option value="localizado">Item localizado?</option>
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
					<th>Não Localizado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($itens as $item)
				<tr>
					<td>{{ $item->id }}
					</td>
					<td>
					@if(!empty($item->sala->predio->predio)) {{-- Confere o prédio do index ou da pesquisa por prédio do index --}}
						{{ $item->sala->predio->predio }}
					@else
						{{ $item->predio }}
					@endif
					</td>
					@if(!empty($item->sala->sala))
						<td>{{ $item->sala->sala }}</td>
					@else
						<td>{{ $item->sala }}</td>
					@endif
					<td>{{ $item->tombamento }}</td>
					<td class="shorten">{{ $item->descricao }}</td>
					<td class="shorten">
						@if($item->localizado)
							<input type="checkbox" class='checkbox' value='{{ $item->id }}' checked>
						@else 
							<input type="checkbox" class='checkbox' value='{{ $item->id }}'>
						@endif
					</td>
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
	$('.checkbox').click(function(){
		var id = $(this).val();
		var checkbox = "";

		// Item não localizado?
		if(this.checked){
			checkbox = 1; //Sim
		} else {
			checkbox = 0; //Não
		}

		$.get('/itens/'+id+'/'+checkbox, function(predios){
			alert(value.id);
		});
	});
</script>
@endpush
