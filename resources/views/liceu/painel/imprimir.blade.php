<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Liceu</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
        }

        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: 21cm;
        }
    </style>
</head>

<body>
    <page size="A4">

        <div class="header">
            <spam style="font-size: 20px;font-weight: 600; text-transform: uppercase;">{{$cursos->unidade}}</spam>
            <br>
            <spam><b>Nucleo:</b> {{$cursos->nucleo}} </spam>
            <br>
            <spam><b>Horaio:</b> {{$cursos->horario_inicial }} - {{$cursos->horario_final}}</spam>
            <br>
            <spam><b>Dia:</b> {{$cursos->dia }}</spam>
            <br>
            <spam></spam>
            <h3>Curso: <spam style="text-transform: uppercase;">{{$cursos->curso}} </spam>
                <br>
                Instrutor: <spam style="text-transform: uppercase;"> {{$cursos->instrutor}}</spam>
            </h3>
        </div>

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Inscrição</th>
                    <th>Assinatura</th>

                </tr>
            </thead>
            <tbody>
                @php
                $cont = 1;
                @endphp
                @foreach($inscricao as $dados)
                <tr>
                    <td> {{$cont}}</td>
                    <td>{{$dados->Nome}}</td>
                    <td>{{$dados->contato1}}</td>
                    <td>{{$dados->created_at}}</td>
                    <td></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </page>

    <page size="A4"></page>
</body>
<script>
    function Imprimir() {
        window.print()
    }
    Imprimir();
</script>

</html>