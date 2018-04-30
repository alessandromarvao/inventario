@extends('default')

@section('content')
<h3>Item <small>\ Novo</small></h3>
<form action="{{ route('item.store') }}" method="post">
    @include('itens.form')
</form>
@stop