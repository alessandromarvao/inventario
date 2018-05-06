@extends('default')

@section('content')
<h2>Prédio <small>> Novo</small></h2>
<form action="{{ route('predio.store') }}" class="form" method="post">
    @include('predios.form');
</form>
@stop

