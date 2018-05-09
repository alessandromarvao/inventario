@extends('default')

@section('content')
<div class="panel panel-default central">
	<div class="panel-body">
        <h2>Sala <small>\ Editar</small></h2>
        <form action="{{ route('sala.update', $sala->id) }}" class="form" method="post">
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="data_hidden" value='{{ $sala->visitada_em }}' />
            @include('salas.form')
        </form>
    </div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="/js/ajax.salas.js" charset="utf-8"></script>
<script charset="utf-8">
    $('document').ready(function() {
        var id = {{ $sala->predio->id }};
        var data = $('input[name=data_hidden]').val();
        $.get('/predios/', function(predios){
            $.each(JSON.parse(predios), function(key, value){
                if(value.id==id){
                    $('select[name=predio]').append("<option value='" + value.id + "' selected>" + value.predio + '</option>');
                } else {
                    $('select[name=predio]').append("<option value='" + value.id + "'>" + value.predio + '</option>');
                }
            });
        });
        if(data!=="") {
            $('#visitada').prop('selectedIndex',1);
            $('#exibe_data').attr('class', 'form-group');
            $('input[name=data]').val(data);
        }
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
