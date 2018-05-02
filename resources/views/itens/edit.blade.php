@extends('default')

@section('content')
<h2>Item <small>\ Editar</small></h2>
<form action="{{ route('item.update', $item->id) }}" class="form" method="post">
	<input type="hidden" name="_method" value="PUT" />
    @include('itens.form');
</form>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$('document').ready(function(){
		predio();

		$('select[name=predio]').hover(function(){
			var predio = $(this).val();

			$.get('/salas/' + predio, function(salas){
				$('select[name=sala]').empty();
				$.each(JSON.parse(salas), function(key, value){
					$('select[name=sala]').append("<option value='" + value.id + "'>" + value.sala + "</option>");
				});
			});
		});

	});
</script>
@endpush