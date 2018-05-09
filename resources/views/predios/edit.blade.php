@extends('default')

@section('content')

<div class="panel panel-default central">
    <div class="panel-body">
        <h2>Editar <small> - {{ $predio->predio }}</small></h2>
        <form action="{{ route('predio.update', $predio->id) }}" class="form" method="post">
            <input type="hidden" name="_method" value="PUT" />
            @include('predios.form');
        </form>
    </div>
</div>
@stop

