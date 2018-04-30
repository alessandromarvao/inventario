@extends('default')

@section('content')
<h3>Sala <small>\ Editar</small></h3>
<form action="{{ route('sala.store') }}" class="form" method="post">
    @include('salas.form');
</form>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="uft-8"></script>
@endpush
