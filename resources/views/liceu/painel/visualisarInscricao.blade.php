@extends('layouts.dashboard')

@section('title')
Visualizar Inscrição
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Perfil do
    Inscrito</h1>

<form class="ui form container" action="/inscricao/{{ $inscricao->uuid }}" method="POST" enctype="multipart/form-data">
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



    <div>


        <div style="border-style: solid;border-radius: 5px;border-width:1px;margin-bottom:4rem">
            <div class="header" style="padding: 1rem; padding-bottom: 0px">
                <div class="two fields">
                    <div class="field">
                        <spam style="font-size: 20px;font-weight: 600; text-transform: uppercase;">
                            {{ $inscricao->unidade }}
                        </spam>
                        <br>
                        <spam><b>Nucleo:</b> {{ $inscricao->nucleo }} </spam>
                        <br>
                        <spam><b>Horaio:</b> {{ $inscricao->horario_inicial }} - {{ $inscricao->horario_final }}</spam>
                        <br>
                        <spam><b>Dia:</b> {{ $inscricao->dia }}</spam>
                    </div>
                    <div class="field">
                        <h3>Curso: <spam style="text-transform: uppercase;">{{ $inscricao->curso }} </spam>
                            <br>
                            Instrutor (a): <spam style="text-transform: uppercase;"> {{ $inscricao->instrutor }}</spam>
                        </h3>
                    </div>
                </div>

            </div>
            <form class="ui form" action="">
                @csrf
                <h2 style="padding: 20px " class="titulo-mobile-centro">Informações</h2>
                <!--Elementos dispostos em Grid justify arround com borda e box shadow tirado por css-->
                <div class="two fields" style="padding: 0px 6.5%;justify-content:space-around">
                    <div class="field" style="margin-right: 2px;margin-top:13px;">

                        <div class="inline fields">
                            <label>Nome:</label>
                            <input type="text" name="Nome" id="" value="{{ $inscricao->Nome }}">
                        </div>
                        <div class="inline fields">
                            <label>Nome Social:</label>
                            <input type="text" name="Nomesocial" id="" value="{{ $inscricao->Nomesocial }}">
                        </div>
                        <div class="inline fields">
                            <label>Data de Nascimento:</label>
                            <input type="date" name="nascimento" id="" value="{{ $inscricao->nascimento }}">
                        </div>

                        <div class="inline fields">
                            <label>Idade:</label>
                            <input type="text" name="idade" id="" value="{{ $inscricao->idade }}">
                        </div>

                        <div class="inline fields">
                            <label>Possui Deficiencia:</label>
                            <input type="text" name="deficiancia" id="" value="{{ $inscricao->deficiancia }}">
                        </div>


                        <div class="inline fields">
                            <label>Tipo de Deficiencia:</label>
                            <input type="text" name="qual" id="" value="{{ $inscricao->qual }}">
                        </div>
                        <div class="inline fields">
                            <label>Sexo:</label>
                            <input type="text" name="sexo" id="" value="{{ $inscricao->sexo }}">
                        </div>
                        <div class="inline fields">
                            <label>Estado Civil:</label>
                            <input type="text" name="estadocivil" id="" value="{{ $inscricao->estadocivil }}">
                        </div>

                        <div class="inline fields">
                            <label>RG:</label>
                            <input type="text" name="rg" id="" value="{{ $inscricao->rg }}">
                        </div>

                        <div class="inline fields">
                            <label>CPF:</label>
                            <input type="text" name="cpf" id="" value="{{ $inscricao->cpf }}">
                        </div>
                        <div class="inline fields">
                            <label>Estado:</label>
                            <input type="text" name="uf" id="" value="{{ $inscricao->uf }}">
                        </div>
                        <div class="inline fields">
                            <label>Cidade:</label>
                            <input type="text" name="cidade" id="" value="{{ $inscricao->cidade }}">
                        </div>

                        <div class="inline fields">
                            <label>Região da Cidade:</label>
                            <input type="text" name="zona" id="" value="{{ $inscricao->zona }}">
                        </div>

                        <div class="inline fields">
                            <label>Endereço:</label>
                            <input type="text" name="endereco" id="" value="{{ $inscricao->endereco }}">
                        </div>

                    </div>
                    <div class="field" style="border-style: none;box-shadow:none;padding:0;margin-bottom:2rem;">
                        <div class="inline fields">
                            <label>Numero de Telefone:</label>
                            <input type="text" name="contato1" id="" value="{{ $inscricao->contato1 }}">
                            <a class="ui green button" href="https://api.whatsapp.com/send?phone=55{{ $inscricao->contato1 }}" target="_blank"><i class="whatsapp icon"></i></a>
                        </div>
                        <div class="inline fields">
                            <label>E-mail:</label>
                            <input type="email" name="email" id="" value="{{ $inscricao->email }}">
                        </div>

                        <div class="inline fields">
                            <label>Estuda:</label>
                            <input type="text" name="estuda" id="" value="{{ $inscricao->estuda }}">
                        </div>

                        <div class="inline fields">
                            <label>Escola:</label>
                            <input type="text" name="escola" id="" value="{{ $inscricao->escola }}">
                        </div>
                        <div class="inline fields">
                            <label>Escolaridade:</label>
                            <input type="text" name="escolaridade" id="" value="{{ $inscricao->escolaridade }}">
                        </div>
                        <div class="inline fields">
                            <label>Ano/Semestre:</label>
                            <input type="text" name="anoSementre" id="" value="{{ $inscricao->anoSementre }}">
                        </div>

                        <div class="inline fields">
                            <label>Nome do Pai:</label>
                            <input type="text" name="pai" id="" value="{{ $inscricao->pai }}">
                        </div>
                        <div class="inline fields">
                            <label>Nome da Mãe:</label>
                            <input type="text" name="mae" id="" value="{{ $inscricao->mae }}">
                        </div>
                        <div class="inline fields">
                            <label>Renda (salario):</label>
                            <input type="text" name="renda" id="" value="{{ $inscricao->renda }}">
                        </div>
                        <div class="inline fields">
                            <label>Residência:</label>
                            <input type="text" name="residencia" id="" value="{{ $inscricao->residencia }}">
                        </div>

                        <div class="inline fields">
                            <label>Moradores:</label>
                            <input type="text" name="moradores" id="" value="{{ $inscricao->moradores }}">
                        </div>
                        {{-- <div class="inline fields">
                            <label>Termos : </label>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="text" name="termos" id="" value="{{ $inscricao->termos }}">
                    </div>
                </div>
        </div> --}}
        <div class="inline fields">
            <label>Curso:</label>
            <input type="text" name="curso" id="" value="{{ $inscricao->curso }}" readonly>
        </div>

        <div class="inline fields">
            <label>Possui Instrumento:</label>
            <input type="text" name="instrumento" id="" value="{{ $inscricao->instrumento }}">
        </div>

        <div class="inline fields">
            <label>Tipo de Vaga:</label>
            <input type="text" name="tipoVga" id="" value="{{ $inscricao->tipoVga }}" readonly>
        </div>

    </div>
    </div>
    <div style="margin:10px 6.5%">
        <button class="ui primary button" style="justfy-content:center">
            Salvar
        </button>
    </div>
</form>
<div>
    <h2 style="padding: 10px" class="titulo-mobile-centro">
        Documento
    </h2>
    <!--Area de Dowload disposta dem grid-->
    <div>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Baixar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $doc)
                @if ($doc !== '.' && $doc !== '..')
                <tr>
                    <td data-label="Documento">{{ $doc }}</td>
                    <td data-label="Baixar">
                        <a href="/baixar/{{ $inscricao->uuid }}/{{ $doc }}" class="ui primary button" style="margin: 0" target="_blank">
                            Download
                        </a>
                    </td>
                    <td data-label="Deletar">
                        <a href="/deletar/{{ $inscricao->uuid }}/{{ $doc }}" class="ui red button" style="margin: 0">
                            Deletar
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach


            </tbody>
        </table>

    </div>
</div>

<div style="padding: 10px;">
    <h2>Anexar nova documentação</h2>
    <form class="ui form" action="/upload/documentacao" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="uuid" id="uuid" value="{{ $inscricao->uuid }}">
        <div class="field">
            <label>Foto 3x4 (para Perfil)</label>
            <input type="file" name="perfil">
        </div>
        <div class="field">
            <label>Documento (RG ou Frente do documento com Foto</label>
            <input type="file" name="frente">
        </div>
        <div class="field">
            <label>Documento (Verso do documento com Foto)</label>
            <input type="file" name="verso">
        </div>
        <div class="field">
            <label>Outros documentos</label>
            <input type="file" name="outros">
        </div>
        <input type="submit" class="ui primary button">

    </form>
</div>
</div>
</div>




<style>
    @media (max-width:705px) {

        /*Ajuste do texto para o centro*/
        .titulo-mobile-centro {
            text-align: center;
            margin: 25px 0px;


        }

        /*Ajuste da grid para ela ficar ocupando 100% do container no moblie*/
        .mobile-grid {
            width: 100%
        }
    }
</style>
@endsection