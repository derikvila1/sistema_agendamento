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
        @media only screen and (max-width: 600px) {
            .titulo-pagina {
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
                color: rgb(66, 97, 138);
                font-size: 20px;
                text-align: center;

            }
        }
        
        @media only screen and (max-width: 412px) {
            .titulo-pagina {
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
                color: rgb(66, 97, 138);
                font-size: 15px;
                text-align: center;

            }
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
                    Selecione a turma
                </h1>
              
            </div>

            <br>
            <div class="ui breadcrumb">
                <a class="section" href="/">Home</a>
                <span class="divider">/</span>
                <a class="section" href="/selecionar-curso/">Unidade</a>
                <span class="divider">/</span>
                <a class="section" href="/selecionar-curso/{{$unidade}}">Nucleo</a>
                <span class="divider">/</span>
                <a class="section" href="/selecionar-curso/{{$unidade}}/{{$nucleo}}">Curso</a>
                <span class="divider">/</span>
                <div class="active section">Turma</div>
            </div>
            <br>
            <br>

            <div class="ui column grid">
                <div class="computer only tablet only two column row">

                    <table class="ui celled table">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Dia</th>
                                <th>Horário</th>
                                <th>Faixa Etária</th>
                                <th>Vagas Restantes</th>
                                {{-- <th>Vagas Reserva Restantes</th> --}}
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $dados)
                            <form action="/inscrever-se/{{$dados->uuid}}" class="">
                                <tr>
                                    <td>{{$dados->curso}}</td>
                                    <td>
                                        <?php
                                        $info = json_decode($dados->dia);
                                        for ($i = 0; $i < count((array)$info); $i++) {
                                            echo $info[$i] . " ";
                                        }
                                        ?>
                                    </td>
                                    <td>{{$dados->horario_inicial}} - {{$dados->horario_final}} </td>
                                    <td>{{$dados->faixa_etaria_inicial}} - {{$dados->faixa_etaria_final}} anos </td>
                                    <td>  @if ($dados->vagas == 0)
                                        Vagas Esgotadas
                                        @else
                                        {{$dados->vagas}}
                                    @endif</td>
                                    {{-- <td>{{$dados->vagas_reserva}}</td> --}}
                                    <td>    @if ($dados->vagas == 0)
                                      
                                        @else
                                        <input type="submit" class="ui blue button" value="Inscrever-se">
                                    @endif
                                </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="ui column grid">
                <div class="mobile only two column row">

                    <table class="ui celled table">

                        <tbody>
                            @foreach($cursos as $dados)
                            <form action="/inscrever-se/{{$dados->uuid}}" class="">
                                <tr>
                                    <td>Curso: {{$dados->curso}}</td>
                                    <td><b>dia:</b>
                                        <?php

                                        $info = json_decode($dados->dia);



                                        for ($i = 0; $i < count((array)$info); $i++) {
                                            echo $info[$i] . " ";
                                        }
                                        ?>
                                    </td>
                                    <td><b>Horario:</b> {{$dados->horario_inicial}} - {{$dados->horario_final}} </td>
                                    <td><b>Faixa Etária:</b> {{$dados->faixa_etaria_inicial}} - {{$dados->faixa_etaria_final}} anos </td>
                                    <td><b>Vagas Restantes:</b>
                                        @if ($dados->vagas == 0)
                                            Vagas Esgotadas
                                            @else
                                            {{$dados->vagas}}
                                        @endif
                                        
                                        </td>
                                    {{-- <td><b>Lista de Espera Restantes:</b> {{$dados->vagas_reserva}}</td> --}}
                                    <td>
                                        @if ($dados->vagas == 0)
                                      
                                        @else
                                        <input type="submit" class="ui blue button" value="Inscrever-se">
                                    @endif
                                    
                                       </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <br><br>
        <br><br>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>


</body>

</html>