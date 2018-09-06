<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Relatório de inventário</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/report.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="/img/ifma.png" alt="logotipo do IFMA">
        </div>
        <div class="txt-header">
            <h3 class="title"><b>INSTITUTO FEDERAL DE CIÊNCIA, EDUCAÇÃO E TECNOLOGIA</b></h3>
            <h3 class="title">MARANHÃO</h3>
            <h4 class="subtitle">Campus Barreirinhas</h4>
            <h4>Comissão de Inventário</h4>
        </div>
        <h3 class="report-title">
            Relatório de Inventário
        </h3>
    </div>
    <table class="table table-bordered table-striped table-width">
        <thead>
            <tr>
                <th>Sala</th>
                <th>Inventário</th>
                <th>Tombamento</th>
                <th>Origem</th>
                <th>Descrição</th>
                <th>Sugestão para Descrição</th>
                <th>Nº de série</th>
                <th>Estado</th>
                <th>Situação</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salas as $sala)
                <tr>
                    <td>
                        {{ $sala->sala->sala }}
                    </td>
                    <td>
                        @if(!empty($sala->inventario))
                            {{ $sala->inventario }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if(!empty($sala->tombamento))
                            {{ $sala->tombamento }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{ $sala->origem }}
                    </td>
                    <td>
                        @if(!empty($sala->descricao))
                            {{ str_limit($sala->descricao, 100) }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if(!empty($sala->descricao_sugerida))
                            {{ $sala->descricao_sugerida }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if(!empty($sala->num_serie))
                            {{ $sala->num_serie }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($sala->localizado==1)
                            -
                        @else
                            {{ $sala->estado }}
                        @endif
                    </td>
                    <td>
                        @if($sala->localizado==1)
                            Não Localizado
                        @elseif($sala->novo==1)
                            Adicionado
                        @else
                            Localizado
                        @endif
                    </td>
                    <td>
                        @if(!empty($sala->observacao))
                            {{ $sala->observacao }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>