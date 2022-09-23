@extends('layouts.dashboard')

@section('title')
Visualizar Curso
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Editar Curso
</h1>

<form class="ui form container" action="/curso/{{ $cursos->uuid }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
    <div class="ui red message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @if (isset($msg_erro))
    <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
            Atualização
        </div>
        <p>{{ $msg_erro }}</p>
    </div>

    <script>
        $('.message .close')
            .on('click', function() {
                $(this)
                    .closest('.message')
                    .transition('fade');
            });
    </script>
    @endif



    <div class="ui form">
        <input type="hidden" name="uuid" value="{{ $cursos->uuid }}">

        <!-- primeira aba do cadastro -->
        <div class="four fields">
            <div class="field">
                <label>Unidade</label>
                <select name="unidade" placeholder="Unidade" required>
                    <option value="{{ old('unidade') ?? $cursos->unidade }}">{{ old('unidade') ?? $cursos->unidade }}</option>
                    <option value="Sambódromo">Sambódromo</option>
                    <option value="PE. Pedro Vignola">PE. Pedro Vignola</option>
                    <option value="Magdalena Arce Daou">Magdalena Arce Daou</option>
                    <option value="Parintins">Parintins</option>
                    <option value="Envira">Envira</option>
                    <option value="Liceu Digital Careiro da Várzea ">Liceu Digital Careiro da Várzea </option>
                    <option value="Liceu Digital Codajás">Liceu Digital Codajás</option>
                    <option value="Liceu Digital Fonte Boa">Liceu Digital Fonte Boa</option>
                    <option value="Liceu Digital Humaitá">Liceu Digital Humaitá</option>
                    <option value="Liceu Digital Itacoatiara">Liceu Digital Itacoatiara</option>
                    <option value="Liceu Digital Urucurituba">Liceu Digital Urucurituba</option>
                    <option value="Liceu Digital Silves">Liceu Digital Silves</option>
                    <option value="Liceu Digital Anori">Liceu Digital Anori</option>
                    <option value="Liceu Digital Caapiranga">Liceu Digital Caapiranga</option>
                    <option value="Liceu Digital Benjamin Constant ">Liceu Digital Benjamin Constant </option>
                    <option value="Liceu Digital Tefé">Liceu Digital Tefé</option>
                    <option value="Liceu Digital Boca do Acre">Liceu Digital Boca do Acre</option>
                    <option value="Liceu Digital Alvarães">Liceu Digital Alvarães</option>
                    <option value="Liceu Digital São Gabriel da Cachoeira">Liceu Digital São Gabriel da Cachoeira</option>
                    <option value="Liceu Digital São Sebastião do Uatumã">Liceu Digital São Sebastião do Uatumã</option>
                    <option value="Liceu Digital Tapauá">Liceu Digital Tapauá</option>
                    <option value="Liceu Digital Tabatinga">Liceu Digital Tabatinga</option>
                    <option value="Liceu Digital Barcelos">Liceu Digital Barcelos</option>
                    <option value="Liceu Digital Rio Preto da Eva ">Liceu Digital Rio Preto da Eva </option>
                    <option value="Liceu Digital Carauari">Liceu Digital Carauari</option>
                    <option value="Liceu Digital Novo Airão">Liceu Digital Novo Airão</option>
                </select>
            </div>
            <div class="field">
                <label>Núcleo</label>
                <input type="text" name="nucleo" placeholder="Núcleo" value="{{ old('nucleo') ?? $cursos->nucleo }}">
            </div>
            <div class="field">
                <label>Curso</label>
                <input type="text" name="curso" placeholder="Curso" value="{{ old('curso') ?? $cursos->curso }}">
            </div>
            <div class="field">
                <label>Instrutor</label>
                <input type="text" name="instrutor" placeholder="Instrutor" value="{{ old('instrutor') ?? $cursos->instrutor }}">
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label>Dia da Semana</label>
                <div class="inline fields">
                    <div class="field">
                        <div class="ui  checkbox">

                            <?php
                            if (strpos($cursos->dia, 'Segunda') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Segunda" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Segunda" >';
                            }
                            ?>


                            <label>Seg</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Terca') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Terca" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Terca" >';
                            }
                            ?>
                            <label>Ter</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui  checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Quarta') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Quarta" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Quarta" >';
                            }
                            ?>
                            <label>Qua</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui  checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Quinta') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Quinta" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Quinta" >';
                            }
                            ?>
                            <label>Qui</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui  checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Sexta') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Sexta" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Sexta" >';
                            }
                            ?>
                            <label>Sex</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui  checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Sabado') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Sabado" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Sabado" >';
                            }
                            ?>
                            <label>Sab</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui  checkbox">
                            <?php
                            if (strpos($cursos->dia, 'Domingo') !== false) {
                                echo ' <input type="checkbox" name="dia[]" value="Domingo" checked="checked"  >';
                            } else {
                                echo ' <input type="checkbox" name="dia[]" value="Domingo" >';
                            }
                            ?>
                            <label>Dom</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field two fields">
                <div class="field">
                    <label>Horario Inicial</label>
                    <input type="time" name="horario_inicial" placeholder="Horario Inicial" value="{{ old('horario_inicial') ?? $cursos->horario_inicial }}">
                </div>
                <div class="field">
                    <label>Horario Final</label>
                    <input type="time" name="horario_final" placeholder="Horario Inicial" value="{{ old('horario_final') ?? $cursos->horario_final }}">
                </div>
            </div>
        </div>

        <div class="four fields">



            <div class="field">
                <label>Faixa Etarias Inicial</label>
                <input type="number" name="faixa_etaria_inicial" placeholder="Faixa Etarias Inicial" value="{{ old('faixa_etaria_inicial') ?? $cursos->faixa_etaria_inicial }}">
            </div>
            <div class="field">
                <label>Faixa Etarias Final</label>
                <input type="number" name="faixa_etaria_final" placeholder="Faixa Etarias Final" value="{{ old('faixa_etaria_final') ?? $cursos->faixa_etaria_final }}">
            </div>
            <div class="field">
                <label>Período Inicial</label>
                <select name="periodo_inicio" placeholder="Período Inicial">
                    <option value="{{ old('periodo_inicio') ?? $cursos->periodo_inicio }}">
                        {{ old('periodo_inicio') ?? $cursos->periodo_inicio }}
                    </option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>
                </select>
            </div>
            <div class="field">
                <label>Período Final</label>
                <select name="periodo_fim" placeholder="Período Final">
                    <option value="{{ old('periodo_fim') ?? $cursos->periodo_fim }}">
                        {{ old('periodo_fim') ?? $cursos->periodo_fim }}
                    </option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>
                </select>

            </div>
        </div>

        <div class="three fields">
            <div class="field">
                <label>Vagas Disponiveis</label>
                <input type="number" name="vagas" placeholder="Vagas" value="{{ old('vagas') ?? $cursos->vagas }}">
            </div>
            <div class="field">
                <label>Vagas Reserva</label>
                <input type="number" name="vagas_reserva" placeholder="Vagas Reserva" value="{{ old('vagas_reserva') ?? $cursos->vagas_reserva }}">
            </div>
            <div class="field">
                <label>Vagas Cadastradas</label>
                <input type="text" value="{{ count($inscricao) + $cursos->vagas }}" disabled>
            </div>


        </div>
        <div class="field">
            <label>Pré-Requisito</label>
            <input type="text" name="prerequisito" placeholder="Pré-Requisito" value="{{ old('prerequisito') ?? $cursos->prerequisito }}">
        </div>

        <div class="field">
            <label>Link para Sala</label>
            <input type="text" name="link" placeholder="Link" value="{{ old('link') ??  $cursos->link }}">
        </div>


    </div>

    <div class="sixteen wide column" style=" padding: 5px;" align="center">
        <button class="ui button enviar" type="submit">Salvar</button>
    </div>


</form>

<br><br>
<div class="ui container ">
    <div align="center">
        <h2>Matriculas</h2>
    </div>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Documento</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscricao as $dados)
            <tr>
                <td>{{ $dados->Nome }}</td>
                <td>{{ $dados->cpf }}</td>
                <td>{{ $dados->email }}</td>
                <td>{{ $cursos->curso }}</td>
                <td>{{ $cursos->unidade }}</td>
                <td align="center">
                    <a class="ui blue button" href="/inscricao/{{ $dados->uuid }}"><i class="edit icon"></i></a>
                    <button class="ui red button" onclick=" $('#{{$dados->uuid}}').modal('setting', 'transition', 'fade up').modal('show');"><i class="trash icon"></i></button>
                </td>
            </tr>
            <div class="ui modal" id="{{ $dados->uuid }}">
                <h1 class="header" align="center"> Deseja excluir esse aluno?</h1>
                <div class="content" align="center">
                    <a class="big ui red  button" href="/inscricao/deletar/{{ $dados->id }}">Sim</a> <button class=" big ui green  button" onclick=" $('#{{$dados->uuid}}') .modal('hide');"> Não</button>

                </div>
            </div>

            @endforeach
        </tbody>
    </table>
    <a class="ui blue button" href="/imprimir/{{ $cursos->uuid }}" target="blank_"> imprimir </a>
</div @endsection