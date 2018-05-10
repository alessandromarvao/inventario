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
		
		getSala();

		$('select[name=predio]').change(function(){
			getSala();
		});

		var estado = $('#input_estado').val();
		
		var $select = $('#estado');

		var i=0;
		$select.find('option').each(function(index){
			if($(this).text() == estado){
				$select.prop('selectedIndex',i);
				return false;
			}
			i++;
		});
	});
</script>
@endpush