@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
		<h2>Item</h2>
		<hr>
		<div class="alert alert-success hidden" id="success-msg" role="alert">
			Cadastro realizado com sucesso!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<label for="form">Pesquisar:</label>
		<form action="{{ route('item.search') }} " method="GET" class="form-inline form-width"  id="form">
			{{-- {!! csrf_field() !!} --}}
			<select class="form-control" name="select">
				<option value="sala">Sala</option>
				<option value="predio">Prédio</option>
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
					<th>Prédio</th>
					<th>Sala</th>
					<th>Descrição</th>
					<th>Tombamento</th>
					<th>Situação</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($itens as $item)
				<tr>
					<td>
					@if(!empty($item->sala->predio->predio)) {{-- Confere o prédio do index ou da pesquisa por prédio do index --}}
						{{ $item->sala->predio->predio }}
					@else
						{{ $item->predio }}
					@endif
					</td>
					<td>
					@if(!empty($item->sala->sala))
						{{ $item->sala->sala }}
					@else
						{{ $item->sala }}
					@endif
					</td>
					<td class="shorten">{{ $item->descricao }}</td>
					<td>{{ $item->tombamento }}</td>
					<td>
						@if($item->localizado)
							<input type="checkbox" class='checkbox' value='{{ $item->id }}' checked> Não Localizado
						@else
							<input type="checkbox" class='checkbox' value='{{ $item->id }}'> Não Localizado
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
			var successMsg = $('#success-msg');
			successMsg.alert();

			// if(successMsg.attr('class').indexOf('hidden')==20){
			// 	successMsg.removeClass('hidden');
			// } else {
			// 	successMsg.addClass('hidden');
			// }
		});
	});
</script>
@endpush
