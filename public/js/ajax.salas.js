//Exibe os prédios cadastrados e armazena em um campo select
function predio(){
    idPredio = $('input[name=idPredio]').val();
    $.get('/predios/', function(predios){
        $.each(JSON.parse(predios), function(key, value){
            $('select[name=predio]').append("<option value='" + value.id + "'>" + value.predio + '</option>');
        });
        if(idPredio!==""){
            $('select[name=predio]').prop('selectedIndex', idPredio-1);
        }
    });
};

