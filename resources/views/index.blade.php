@extends('default')

@section('content')
<h2>Sistema de Controle de Inventário <small>\ IFMA - Campus Barreirinhas</small></h2>

<div class="index-content">
    <div class="buttom-index">
        <a href="/item" class="btn btn-lg btn-default col-xs-4 col-xs-offset-4">Visualizar itens</a>
    </div>
    <div class="buttom-index">
        <a href="/sala" class="btn btn-lg btn-default col-xs-4 col-xs-offset-4">Visualizar Salas</a>
    </div>
    <div class="buttom-index">
        <a href="/predio" class="btn btn-lg btn-default col-xs-4 col-xs-offset-4">Visualizar Prédios</a>
    </div>
</div>
@stop