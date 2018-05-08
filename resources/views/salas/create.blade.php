@extends('default')

@section('content')
<h2>Sala <small>\ Novo</small></h2>
<form action="{{ route('sala.store') }}" class="form" method="post">
    @include('salas.form');
</form>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$('document').ready(predio);
    $('select[name=visitada]').change(function(){
        if($(this).val()==true){
            $('#exibe_data').attr('class', 'form-group');
        } else {
            $('#exibe_data').attr('class', 'hidden');
        }
    });
</script>
@endpush
