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
            margin-right: 6%;
            margin-left: 6%;

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

    <div class="ui container" style="padding-top: 5rem ;">

        <div class="card-form">


            <div style="text-align: center;">

                <img src="http://cultura.am.gov.br/portal/wp-content/uploads/2022/03/remove.png" width="55px" style="">
                <h1 class="titulo-pagina">
                    {{$erro}}
                </h1>
                @if($erro === 'Usuario já inscrito')
                <p style="font-size: 18px; padding-left: 15px; padding-right: 15px;">Clique abaixo para reimprimir o comprovante</p>

                <a class="medium ui button" href="/reimpressao">
                    Reimprimir
                </a>
                @endif

                @if($erro === 'Não a vagas disponiveis')
                <p style="font-size: 18px; padding-left: 15px; padding-right: 15px;">Clique abaixo para tentar outro curso</p>

                <a class="medium ui button" href="/selecionar-curso">
                    Retornar
                </a>
                @endif


                @if($erro === 'Cursos não encontrado')
                <p style="font-size: 18px; padding-left: 15px; padding-right: 15px;">Clique abaixo para tentar outro curso</p>

                <a class="medium ui button" href="/selecionar-curso">
                    Retornar
                </a>
                @endif


            </div>


            <br><br>
            <br><br>
            </form>
        </div>
        <br><br>
        <br><br>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>

</html>