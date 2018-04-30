$('document').ready(function(){
    $.get('/predios/', function(predios){
        $.each(JSON.parse(predios), function(key, value){
            $('select[name=predio]').append("<option value='" + value.predio + "'>" + value.predio + '</option>');
        });
    });
});
// $('select[name=predio]').change(function(){
//     var 
// });