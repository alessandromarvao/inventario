@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
		<h2>Relatórios</h2>
		<label for="predio">Selecione a sala:</label>
		<form action="{{ route('relatorio.listar') }}" class="form-inline form-width" method="get">
			<select name="predio" class='form-control' id="idPredio"></select>
			<select name="sala" class='form-control' id="idSala"></select>
			<input type="submit" class="btn btn-success" value="Gerar PDF">
		</form>
		<hr>
		<label for="select-opcoes">Gerar relatório por situações:</label>
		<form action="{{ route('relatorio.situacao') }}" class="form-inline form-width">
			<select name="opcoes" class="form-control" id="select-opcoes" >
				<option value="1">Itens localizados e não localizados</option>
				<option value="2">Itens particulares</option>
				<option value="3">Itens ociosos</option>
				<option value="4">Itens inservíveis</option>
				<option value="5">Itens com observação</option>
			</select>
			<input type="submit" class="btn btn-success" value="Gerar PDF">
		</form>
		<hr>
		<label>Gerar relatório para todas as salas:</label>
		<form action="{{ route('relatorio.listar') }}" class="form-inline form-width" method="get">			
			<input type="submit" class="btn btn-success" value="Gerar PDF">
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