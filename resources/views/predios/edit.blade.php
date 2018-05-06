@extends('default')

@section('content')
<h2>Prédio <small>> Editar</small></h2>
<form action="{{ route('predio.update', $predio->id) }}" class="form" method="post">
    <input type="hidden" name="_method" value="PUT" />
    @include('predios.form');
</form>
@stop

