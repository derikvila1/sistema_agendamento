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

    <div class="ui container" style="padding-top: 5rem ;">

        <div class="card-form">


            <div style="text-align: center;">

            <img src="http://cultura.am.gov.br/portal/wp-content/uploads/2022/03/Lgos-2.png" width="70%" style=" text-align:center;">
                <h1 class="titulo-pagina">
                    Inscrição
                </h1>
             
            </div>

            <br><br>

@if($cursos[0]->vagas == 0)

<div class="ui yellow message">Este Curso possui apenas vagas para cadastro de reserva</div>

@endif
            <form class="ui form" action="/inscrever-se/salvar" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="two fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="nucleo">Núcleo: </label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->nucleo}}</p>
                    </div>

                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="curso">Curso</label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->curso}}</p>

                    </div>

                </div>

                <div class="field">
                    <label style="color: rgb(46, 74, 124);" for="unidade">Unidade</label>
                    <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->unidade}}</p>
                </div>


                <div class="two fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="dia">Dia</label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->dia}}</p>
                    </div>

                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="horario">Horario</label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->horario_inicial}} - {{$cursos[0]->horario_final}}</p>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="instrutor">instrutor</label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->instrutor}}</p>
                    </div>

                    <div class="field">
                        <label style="color: rgb(46, 74, 124);" for="faixa_etaria">Faixa Etaria</label>
                        <p style="font-weight: 600;font-size: medium; text-transform:capitalize">{{$cursos[0]->faixa_etaria_inicial}} - {{$cursos[0]->faixa_etaria_final}} Anos</p>
                    </div>
                </div>

                <div class="field">
                    <input type="hidden" name="uuid" id="uuid" value="{{$cursos[0]->uuid}}">
                </div>

                <div class="field" >
                    <label style="color: rgb(46, 74, 124);">Possui instrumento</label>
                    <div class="inline fields">
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="instrumento" checked="checked" value="Sim">
                                <label>Sim</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="instrumento" value="Não">
                                <label>Não</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Nome Completo</label>
                    <input type="text" name="Nome" id="nome" placeholder="Nome Completo" required>
                </div>

                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Nome Social</label>
                    <input type="text" name="Nomesocial" placeholder="Nome Social">
                </div>

                <div class="four fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Data de nascimento</label>
                        <input type="date" name="nascimento" placeholder="Data de nascimento" required>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Idade</label>
                        <input type="number" name="idade" placeholder="Idade" required>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Possui deficiência?</label>
                         <select name="deficiancia" id="">
                            <option value="">Selecione uma Opção</option>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                      
                        </select>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Qual?</label>
                        <input type="number" name="qual" placeholder="Qual?">
                    </div>
                </div>

                <div class="two fields"  >
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Estado Civil</label>
                        <select name="estadocivil" id="">
                            <option value="">Selecione uma Opção</option>
                            <option value="Casado" selected>Casado</option>
                            <option value="Solteiro">Solteiro</option>
                            <option value="União estavel">União estavel</option>
                        </select>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Sexo</label>
                        <select name="estadocivil" id="">
                            <option value="">Selecione uma Opção</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Não Informa">Não Informa</option>
                        </select>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">RG</label>
                        <input type="text" name="rg" placeholder="RG" required>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">CPF</label>
                        <input type="number" name="cpf" placeholder="CPF" required>
                    </div>
                </div>


                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Endereço</label>
                    <input type="text" name="endereco" placeholder="Endereço" required>
                </div>


                <div class="three fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Zona</label>
                        <input type="number" name="zona" placeholder="Zona">
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Cidade</label>
                        <input type="text" name="cidade" placeholder="Cidade" required>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">UF</label>
                        <input type="text" name="uf" placeholder="UF" required>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Contato</label>
                        <input type="number" name="contato1" placeholder="Contato" required>
                    </div>

                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">E-mail </label>
                        <input type="email" name="email" placeholder="E-mail " required>
                    </div>
                </div>




                <div class="four fields">
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Estuda</label>
                        <div class="inline fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="estuda" checked="checked" value="Sim">
                                    <label>Sim</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="estuda" value="Não">
                                    <label>Não</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Escola Pública</label>
                        <div class="inline fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="escola" checked="checked" value="Sim">
                                    <label>Sim</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="escola" value="Não">
                                    <label>Não</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Escolaridade</label>
                        <select name="escolaridade" id="">
                            <option value="">Selecione uma Opção</option>
                            <option value="Fundamental ">Fundamental</option>
                            <option value="Fundamental Completo">Fundamental Completo</option>
                            <option value="Medio">Medio</option>
                            <option value="Medio Completo">Medio Completo</option>
                            <option value="Superior">Superior</option>
                            <option value="Superior Completo">Superior Completo</option>
                        </select>
                    </div>

                    <div class="field">
                        <label style="color: rgb(46, 74, 124);">Ano/Semestre </label>
                        <input type="text" name="anoSementre" placeholder="Ano/Semestre">
                    </div>
                </div>



                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Nome do pai</label>
                    <input type="text" name="pai" placeholder="Nome do pai">
                </div>

                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Nome da mãe</label>
                    <input type="text" name="mae" placeholder="Nome da mãe">
                </div>

                <div class="field"  >
                    <label style="color: rgb(46, 74, 124);">Renda Familiar? (em salarios minimos)</label>
                    <div class="inline fields">
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="renda" checked="checked" value="1 a 3">
                                <label>1 a 3</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="renda" value="4 a 6">
                                <label>4 a 6</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="renda" value="7 a 9">
                                <label>7 a 9</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="renda" value="10 ou mais">
                                <label>10 ou mais</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field"  >
                    <label style="color: rgb(46, 74, 124);">Possui Residência?</label>
                    <div class="inline fields">
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="residencia" checked="checked" value="Própria">
                                <label>Própria</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="residencia" value="Alugada">
                                <label>Alugada</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="residencia" value="Financiada">
                                <label>Financiada</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="residencia" value="Cedida">
                                <label>Cedida</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field"  >
                    <label style="color: rgb(46, 74, 124);">Quantas Pessoas Moram em Sua Casa?</label>
                    <input type="number" name="moradores" placeholder="Quantas Pessoas Moram em Sua Casa?">
                </div>

                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Documento para Anexar(RG/CNH)</label>
                    <select name="documento" id="documento">

                        <option value="">Selecione um Documento que ira anexar</option>
                        <option value="RG">RG</option>
                        <option value="CNH">CNH</option>
                    </select>
                </div>


                <div id="document"></div>



                <div class="ui message">
                    <div class="header">
                        Termos de Serviço
                    </div>
                    <p>Comprometo-me a participar de todas as atividades promovidas pelo <b>LICEU DE ARTES E OFÍCIO CLÁUDIO SANTORO</b> seguindo determinações pedagógicas, respeitando funcionários e a todas orientações e normas disciplinares. Zelar pelos materiais didáticos e instrumentos do LAOCS, ressarcindo o mesmo do prejuízo que causar individualmente ou em grupo. Tenho ciência que se obter duas 2 (duas) faltas consecutivas sem justificativas, serei considerado <b>desistente</b> do curso o qual estou matriculado.</p>
                </div>

                <div class="ui checkbox">
                    <input type="checkbox" name="termos" required>
                    <label>LI E ACEITO</label>
                </div>

                <br>
                <button class="ui button" id="botao-enviar" type="submit">Enviar</button>

                <br><br>
                <br><br>
            </form>
        </div>
        <br><br>
        <br><br>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

    <script>
        $('#documento').change(function() {

            if ($('#documento').val() === 'RG') {
                html = `<div class="field">
                    <label style="color: rgb(46, 74, 124);">Anexar RG Frente</label>
                    <input type="file" name="file[]"  accept=".jpg, .jpeg,.pdf">
                </div>

                <div class="field">
                    <label style="color: rgb(46, 74, 124);">Anexar RG Verso</label>
                    <input type="file" name="file[]"  accept=".jpg, .jpeg,.pdf">
                </div>`
                $('#document').html(html);
            } else if ($('#documento').val() === 'CNH') {
                html = `<div class="field">
                    <label style="color: rgb(46, 74, 124);">Anexar CNH</label>
                    <input type="file" name="file[]"  accept=".jpg, .jpeg,.pdf">
                    
                </div>`

                $('#document').html(html);

            }
        });
    </script>

</body>

</html>