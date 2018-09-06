@extends('default')

@section('content')
<h2>Item <small>\ Exibir</small></h2>
<div class="panel panel-default">
    <div class="panel-body">
        <a href="/item" class="btn btn-sm btn-default">Voltar</a>
        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-default">Editar</a>
        {{-- <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-sm btn-info">Excluir</a> --}}
        {{--
        <form class="form-horizontal" action="{{ route('item.destroy', $item->id) }}" method="post" style="display: inline-block">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE" />
        	<input type="submit" value="Excluir" class="btn btn-sm btn-info" >
        </form>
        --}}
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Inventário</th>
                <th>Prédio</th>
                <th>Sala</th>
                <th>Tombamento</th>
                <th>Descrição</th>
                <th>Estado</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $item->inventario }}</td>
                <td>{{ $item->sala->predio->predio }}</td>
                <td>{{ $item->sala->sala }}</td>
                <td>{{ $item->tombamento }}</td>
                <td>{{ $item->descricao }}</td>
                <td>{{ $item->estado }}</td>
                <td>
                    @if($item->localizado==1)
                        Não localizado
                    @else
                        Localizado
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop