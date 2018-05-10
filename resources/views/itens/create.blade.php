@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
		<h2>Novo <small> Item </small></h2>
		<form action="{{ route('item.store') }}" method="post">
			@include('itens.form')
		</form>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$('document').ready(function(){
		predio();

		createSalas(1);

		$('select[name=predio]').change(function(){
			createSalas($(this).val());
		});

	});
</script>
@endpush
