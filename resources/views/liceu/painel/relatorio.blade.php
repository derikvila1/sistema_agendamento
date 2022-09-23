@extends('layouts.dashboard')

@section('title')
Relatorio
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



    <table class="ui celled table">
        <thead>
            <tr>
                <th>Unidade</th>
                <th>Nucleo</th>
                <th>Curso</th>
                <th>Dia</th>
                <th>Horario</th>
                <th>Instrutor</th>
                <th>Vagas Cadastradas</th>
                <th>Vagas Restantes</th>
                <th>Total de Inscritos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $dados)
            <tr>
                <td>{{$dados->unidade}}</td>
                <td>{{$dados->nucleo}}</td>
                <td>{{$dados->curso}}</td>
                <td>{{$dados->dia}}</td>
                <td>{{$dados->horario_inicial}} - {{$dados->horario_final}} </td>
                <td>{{$dados->instrutor}}</td>
                <td>{{$dados->vagas + $dados->inscritos }}</td>
                <td>{{$dados->vagas}}</td>
                <td>{{$dados->inscritos}}</td>
                <td align="center">
                    <a class="ui blue button" href="/curso/{{$dados->uuid}}"><i class="edit icon"></i></a>
                    <a class="ui red button" href="/curso/lista/{{$dados->uuid}}"><i class="trash icon"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection