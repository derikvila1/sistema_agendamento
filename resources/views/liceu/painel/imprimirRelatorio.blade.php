<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Liceu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        th {
            font-size: 15px !important;
            text-transform: capitalize;
        }

        td {
            font-size: 12px !important;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 1px;
        }
    </style>

</head>

<body>
    <div class="header" align="center">
        <h2>Relatorio de inscritos</h2>
    </div>
    <div class="header">
            <spam style="font-size: 20px;font-weight: 600; text-transform: uppercase;">{{$inscricoes[0]->unidade}}</spam>
            <br>
            <spam><b>Nucleo:</b> {{$inscricoes[0]->nucleo}} </spam>
            <br>
            <spam><b>Horaio:</b> {{$inscricoes[0]->horario_inicial }} - {{$inscricoes[0]->horario_final}}</spam>
            <br>
            <spam><b>Dia:</b> {{$inscricoes[0]->dia }}</spam>
            <br>
            <spam></spam>
            <h3>Curso: <spam style="text-transform: uppercase;">{{$inscricoes[0]->curso}} </spam>
                <br>
                Instrutor: <spam style="text-transform: uppercase;"> {{$inscricoes[0]->instrutor}}</spam>
            </h3>
        </div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>contato1</th>
                <th>mae</th>
                <th>pai</th>
                <th>cpf</th>
                <th>email</th>
                <th>idade</th>

            </tr>
        </thead>
        <tbody>

            @foreach($inscricoes as $dados)
            <tr >
                <td style="padding: 2px;"> {{$dados->Nome}}</td>
                <td style="padding: 2px;"> {{$dados->contato1}}</td>
                <td style="padding: 2px;"> {{$dados->mae}}</td>
                <td style="padding: 2px;"> {{$dados->pai}}</td>
                <td style="padding: 2px;"> {{$dados->cpf}}</td>
                <td style="padding: 2px;"> {{$dados->email}}</td>
                <td style="padding: 2px;"> {{$dados->idade}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>




</body>


</html>