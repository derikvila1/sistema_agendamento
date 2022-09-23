@extends('layouts.dashboard')

@section('title')
Gerar relatorio
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Gerar relatorio</h1>
                      
<form class="ui form container" action="/relatorio/imprimir" method="POST" enctype="multipart/form-data" target="_blank">
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

    @if(isset($msg_erro))
    @if($msg_erro === 'Curso Cadastrado Com Sucesso')
    <div class="ui green message">
        @else
        <div class="ui red message">

            @endif
            <ul>
                <li>{{$msg_erro}}</li>
            </ul>
        </div>

        @endif

        <div class="ui form">
            <div class="field">
                <label>Tipo de relatorio</label>
                <select name="tipo" id="tipo" required>
                    <option value="">Selecione um tipo</option>
                    <option value="unidade">Unidade</option>
                    
                    <option value="curso">Curso</option>

                </select>
            </div>
            <!-- primeira aba do cadastro -->
            <div class="three fields">
                <div class="field">
                    <label>Unidade </label>
                    <select name="unidade" id="unidade">
                        <option value="">Selecione uma unidade</option>
                        @foreach($unidades as $unidade)
                        <option value="{{$unidade->unidade}}">{{$unidade->unidade}}</option>
                        @endforeach

                    </select>
                    <span style="font-size: 12px; color: red;"> (somente unidades que já possuem cursos cadastrados)</span>
                </div>
                <div class="field" id="curso">
                    <label>Curso</label>
                    <select name="curso" class="cursos" id="cursos"> 
                    <option value="">Selecione um curso</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->curso}}">{{$curso->curso}}</option>
                        @endforeach


                    </select>
                </div>


                <div class="field" id="horario">
                    <label>horario</label>
                    <select name="horario" class="horarios" id="horarios">
                    <option value="">Selecione um horario</option>
                    @foreach($horarios as $horario)
                        <option value="{{$horario->horario_inicial}}">{{$horario->horario_inicial}}</option>
                        @endforeach
                     

                    </select>
                </div>

            </div>

        </div>

        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Gerar Relatorio</button>
        </div>
      


</form>

<script>
    $('#tipo').change(function() {
        // alert($('#tipo').val());
        if ($('#tipo').val() == "unidade") {
            $('#curso').hide();
            $('#horario').hide();
        }
        if ($('#tipo').val() == "curso") {
            $('#curso').show();
            $('#horario').show();
        }
    })
    $('select')
        .dropdown();
</script>
<script>
    $('#unidade').change(function() {

        link = 'https://sso.cultura.am.gov.br/api/curso?u=' + $('#unidade').val();
        $.ajax({
                method: "get",
                url: link,
                dataType: "json"
            })
            .done(function(data) {

                html = '<option value="" selected>Selecione uma curso</option>';
                $('#cursos').html(html);
                $('.cursos .text').html('Selecione uma curso');
                $('.cursos .text').addClass('default');


                dados = data;
                dados = dados.filter((item, pos, array) => {
                    return array.map(x => x.curso).indexOf(item.curso) === pos;
                });

                for (i = 0; i < dados.length; i++) {

                    html = html + '<option value="' + dados[i].curso + '"> ' + dados[i].curso + '</option>';
                }

                $('#cursos').append(html);


                $('select')
                    .dropdown();
            });

        $('.cursos').change(function() {
            link = 'https://sso.cultura.am.gov.br/api/horario?u=' + $('#unidade').val() + '&c=' + $('#cursos').val();
            console.log(link);
            $.ajax({
                    method: "get",
                    url: link,
                    dataType: "json"
                })
                .done(function(data) {
                    html = '<option value="" selected>Selecione uma horario</option>';
                    $('#horarios').html(html);
                    $('.horarios .text').html('Selecione uma curso');
                    $('.horarios .text').addClass('default');

                    dados = data;
                    dados = dados.filter((item, pos, array) => {
                        return array.map(x => x.curso).indexOf(item.curso) === pos;
                    });

                    for (i = 0; i < dados.length; i++) {

                        html = html + '<option value="' + dados[i].horario_inicial + '"> ' + dados[i].horario_inicial + '</option>';
                    }

                    $('#horarios').append(html);


                    $('select')
                        .dropdown();
                });
        })
    })
</script>
@endsection