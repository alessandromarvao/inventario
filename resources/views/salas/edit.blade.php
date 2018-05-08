@extends('default')

@section('content')
<h2>Sala <small>\ Editar</small></h2>
<form action="{{ route('sala.update', $sala->id) }}" class="form" method="post">
	<input type="hidden" name="_method" value="PUT" />
    @include('salas.form');
</form>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script charset="utf-8">
    $('document').ready(function() {
        $.get('/predios/', function(predios){
            var id = {{ $sala->predio->id }};
            $.each(JSON.parse(predios), function(key, value){
                if(value.id==id){
                    $('select[name=predio]').append("<option value='" + value.id + "' selected>" + value.predio + '</option>');
                } else {
                    $('select[name=predio]').append("<option value='" + value.id + "'>" + value.predio + '</option>');
                }
            });
        });
    });
    $('select[name=visitada]').change(function(){
        if($(this).val()==true){
            $('#exibe_data').attr('class', 'form-group');
        } else {
            $('#exibe_data').attr('class', 'hidden');
        }
    });
</script>
@endpush
