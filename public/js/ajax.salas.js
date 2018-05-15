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

function createSalas(valor) {
    var predio = valor;

    $.get('/salas/' + predio, function(salas){
        $('select[name=sala]').empty();
        $.each(JSON.parse(salas), function(key, value){
            $('select[name=sala]').append("<option value='" + value.id + "'>" + value.sala + "</option>");
        });
    });
};

function getSala(){
    var predioID = $('input[name=idPredio]').val();
    var idSala = $('#idSala').val();
    var selectSala = $('select[name=sala]');
    
    $.get('/salas/' + predioID, function(salas){
        selectSala.empty();
        $.each(JSON.parse(salas), function(key, value){
            if(value.id==idSala){
                selectSala.append("<option value='" + value.id + "' selected>" + value.sala + "</option>");
            } else {
                selectSala.append("<option value='" + value.id + "'>" + value.sala + "</option>");
            }
        });
    });
};