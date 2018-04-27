@extends('layout')

@section('content')
	<div id="table-content"></div>
    <table class="display" id="itens-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Sala</th>
                <th>Tombamento</th>
                <th>Descrição</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script type="text/javascript">
$(function() {
    $('#itens-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("show") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'sala_id', name: 'sala_id' },
            { data: 'tombamento', name: 'tombamento' },
            { data: 'descricao', name: 'descricao' }
        ]
    });
});
</script>
@endpush
