@extends('default')

@section('content')
<h3>Sala <small>\ Novo</small></h3>
<form action="{{ route('sala.store') }}" class="form" method="post">
    @include('salas.form');
</form>
@stop

@push('scrpits')
@endpush