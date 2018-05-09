@extends('default')

@section('content')

<div class="panel panel-default central central">
    <div class="panel-body">
        <h2>Adicionar <small> Prédio</small></h2>
        <form action="{{ route('predio.store') }}" class="form" method="post">
            @include('predios.form')
        </form>
    </div>
</div>
@stop

