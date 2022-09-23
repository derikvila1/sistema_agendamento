<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <title>Inscrição - Liceu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        #botao-enviar {
            float: right;
            background-color: rgb(61, 96, 163);
            font-family: 'Montserrat', sans-serif;
            color: rgb(170, 197, 255);
            font-size: 17px;
        }

        #botao-enviar:hover {
            float: right;
            border-style: solid;
            border-color: rgb(61, 96, 163);
            border-width: 1px;
            color: rgb(61, 96, 163);
            background-color: white;
        }

        .titulo-pagina {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: rgb(66, 97, 138);
            font-size: 30px;
            text-align: center;

        }

        .card-form {
            padding: 5%;
            background-color: white;
            border-radius: 20px;
            box-shadow: 4px 4px 7px 4px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            margin: auto;
        }

        body {
            background: #3a814a;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>

    <div class="" style="padding-top: 5rem ;">

        <div class="card-form">


            <div style="text-align: center;">

            <img src="http://cultura.am.gov.br/portal/wp-content/uploads/2022/03/Lgos-2.png" width="70%" style=" text-align:center;">
                <h1 class="titulo-pagina">
                    Selecione Curso
                </h1>
              
            </div>

            <br>
            
            <form action="/selecionar-curso/teste" method="post" id="pesquisa">
                @csrf
                <div class="ui right aligned">
                    <div class="ui icon input">
                        <input class="prompt" type="text" name="prompt" placeholder="Pesqueisar...">
                        <button type="submit" class="ui blue button"><i class="search icon" id="btn"></i></button>
                    </div>
                </div>
            </form>

<script>
    $('#btn').change(function() {
        $("#pesquisa").submit();
    });
</script>
            <br>


            <table class="ui celled table">
    <thead>
        <tr>
            <th>Unidade</th>
            <th>Nucleo</th>
            <th>Curso</th>
            <th>Dia</th>
            <th>Horario</th>
            <th>Faixa Etária</th>
            <th>Vagas</th>
            <th>Vagas Reserva</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cursos as $dados)
        <form action="/inscrever-se/teste/{{$dados->uuid}}">
        <tr>
            <td>{{$dados->unidade}}</td>
            <td>{{$dados->nucleo}}</td>
            <td>{{$dados->curso}}</td>
            <td>
            <?php
            
            $info = json_decode($dados->dia); 
            
           
      
            for($i=0; $i<count((array)$info); $i++){
                echo $info[$i]." ";
            }
       ?>
            
             

            </td>
            <td>{{$dados->horario_inicial}} - {{$dados->horario_final}} </td>
            <td>{{$dados->faixa_etaria_inicial}} - {{$dados->faixa_etaria_final}} anos </td>
            <td>{{$dados->vagas}}</td>
            <td>{{$dados->vagas_reserva}}</td>
            <td><input type="submit" class="ui blue button"value="Inscrever-se"></td>
        </tr>
        </form>
        @endforeach
    </tbody>
</table>
        </div>
        <br><br>
        <br><br>
    </div>


    <?php $json = json_encode($cursos); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

    <script>
        var jsonJS = <?= $json ?>;
        var dados = [];

        function inciar() {

            for (i = 0; i < jsonJS.length; i++) {
                dados[i] = jsonJS[i].nucleo;
            }
            dados = [...new Set(dados)];
            let options = $('#nucleo');
            
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });
        }
        inciar();

        $('#nucleo').change(function() {

            dados = [];
            j = 0;
            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val()) {
                    dados[j] = jsonJS[i].curso;
                    j++
                }
            }
            dados = [...new Set(dados)];
            let options = $('#curso');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });
        });

        $('#curso').change(function() {
            dados = [];
            j = 0;
            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() && jsonJS[i].curso == $('#curso').val()) {
                    dados[j] = jsonJS[i].unidade;
                    j++
                }
            }
            dados = [...new Set(dados)];
            let options = $('#unidade');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });
        });

        $('#unidade').change(function() {
            dados = [];
            j = 0;

            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() &&
                    jsonJS[i].curso == $('#curso').val() &&
                    jsonJS[i].unidade == $('#unidade').val()) {
                    dados[j] = jsonJS[i].dia;
                    j++
                }
            }
            
            dados = [...new Set(dados)];
            let options = $('#dia');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });
        });

        $('#dia').change(function() {
            dados = [];
            j = 0;

            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() &&
                    jsonJS[i].curso == $('#curso').val() &&
                    jsonJS[i].dia == $('#dia').val() &&
                    jsonJS[i].unidade == $('#unidade').val()) {
                    dados[j] = jsonJS[i].horario_inicial;
                    j++
                }
            }
            dados = [...new Set(dados)];
            let options = $('#horario');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });
        });

        $('#horario').change(function() {
            dados = [];
            j = 0;

            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() &&
                    jsonJS[i].curso == $('#curso').val() &&
                    jsonJS[i].dia == $('#dia').val() &&
                    jsonJS[i].horario_inicial == $('#horario').val() &&
                    jsonJS[i].unidade == $('#unidade').val()) {
                    dados[j] = jsonJS[i].instrutor;
                    j++
                }
            }
            dados = [...new Set(dados)];
            let options = $('#instrutor');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });

            dados = [];
            j = 0;

            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() &&
                    jsonJS[i].curso == $('#curso').val() &&
                    jsonJS[i].dia == $('#dia').val() &&
                    jsonJS[i].horario_inicial == $('#horario').val() &&
                    jsonJS[i].unidade == $('#unidade').val()) {
                    dados[j] = jsonJS[i].faixa_etaria_inicial + ' - ' + jsonJS[i].faixa_etaria_final;
                    j++
                }
            }
            dados = [...new Set(dados)];
            options = $('#faixa_etaria');
            options.find('option').remove();
            $('<option>').text('selecione uma opçao').appendTo(options);
            $.each(dados, function(key, value) {
                $('<option>').val(dados[key]).text(dados[key]).appendTo(options);
            });


        });
        $('#nome').change(function() {
            dados = [];
            j = 0;

            for (i = 0; i < jsonJS.length; i++) {
                if (jsonJS[i].nucleo == $('#nucleo').val() &&
                    jsonJS[i].curso == $('#curso').val() &&
                    jsonJS[i].dia == $('#dia').val() &&
                    jsonJS[i].instrutor == $('#instrutor').val() &&
                    jsonJS[i].horario_inicial == $('#horario').val() &&
                    jsonJS[i].unidade == $('#unidade').val()) {
                    dados[j] = jsonJS[i].uuid;
                    j++
                }
            }
            dados = [...new Set(dados)];
            console.log(dados);
            $('#uuid').val(dados);
        });
    </script>
</body>

</html>