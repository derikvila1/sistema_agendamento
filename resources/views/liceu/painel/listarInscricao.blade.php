@extends('layouts.dashboard')

@section('title')
Listar Inscrições
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')


<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Cursos Cadastrados</h1>

<div class="ui container">
    @if(isset($msg_erro))

    <div class="ui negative message">
        <i class="close icon"></i>
        <div class="header">
            Atualização
        </div>
        <p>{{$msg_erro}}</p>
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


    <form action="/inscricao/lista" method="post" id="pesquisa">
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



    <table class="ui celled table">
        <thead>
            <tr>
                <th>Unidade</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Nucleo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscricao as $dados)
            <tr>
                <td style="text-transform: uppercase;">{{$dados->unidade}}</td>
                <td style="text-transform: uppercase;">{{$dados->cpf}}</td>
                <td style="text-transform: uppercase;">{{$dados->Nome}}</td>
                <td style="text-transform: uppercase;">{{$dados->curso}}</td>
                <td style="text-transform: uppercase;">{{$dados->nucleo}}</td>
                <td align="center">
                    <a class="ui blue button" href="/inscricao/{{$dados->uuid}}"><i class="edit icon"></i></a>
                    <!-- <a class="ui red button" href="/curso/lista/{{$dados->uuid}}"><i class="trash icon"></i></a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection