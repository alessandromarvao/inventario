//Exibe os prédios cadastrados e armazena em um campo select
function predio(){
    $.get('/predios/', function(predios){
        $.each(JSON.parse(predios), function(key, value){
            $('select[name=predio]').append("<option value='" + value.id + "'>" + value.predio + '</option>');
        });
    });
};
