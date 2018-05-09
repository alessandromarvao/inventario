@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
		<h2>Editar</h2>
		<form action="{{ route('item.update', $item->id) }}" class="form" method="post">
			<input type="hidden" name="_method" value="PUT" />
			@include('itens.form');
		</form>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$('document').ready(function(){
		predio();
		
		$('select[name=predio]').hover(function(){
			var predioID = $(this).val();
			var idSala = $('#idSala').val();
			var selectSala = $('select[name=sala]');

			$.get('/salas/' + predioID, function(salas){
				selectSala.empty();
				$.each(JSON.parse(salas), function(key, value){
					if(value.id==idSala){
						selectSala.append("<option value='" + value.id + "' selected>" + value.sala + "</option>");
					} else {
						selectSala.append("<option value='" + value.id + "'>" + value.sala + "</option>");
					}
				});
			});
		});


	});
</script>
@endpush