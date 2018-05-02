@extends('default')

@section('content')
<h2>Sala <small>\ Editar</small></h2>
<form action="{{ route('sala.update', $sala->id) }}" class="form" method="post">
	<input type="hidden" name="_method" value="PUT" />
    @include('salas.form');
</form>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="uft-8"></script>
@endpush
