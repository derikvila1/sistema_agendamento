@extends('layouts.dashboard')

@section('title')
Listar Cursos
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
    <div class="ui segment left aligned">
        <div class="ui top attached label">PESQUISAR</a>
        </div>
        <form>
            <div class="ui fluid action input">
                @csrf
                <input type="text" name="prompt" placeholder="Pesquisar">
                <select class="ui compact selection dropdown" name="type">
                    <option selected="" value="nucleo">pesquisar por nucleo</option>
                    <option value="unidade">pesquisar por unidade</option>
                    <option value="curso">pesquisar por curso</option>
                    <option value="instrutor">pesquisar por instrutor</option>
                </select>
                <button class="ui button">Pesquisar</button>
            </div>
        </form>
    </div>



    <script>
        $('#btn').change(function() {
            $("#pesquisa").submit();
        });
    </script>



    <table class="ui celled table">
        <thead>
            <tr>
                <th>Unidade</th>
                <th>Nucleo</th>
                <th>Curso</th>
                <th>Dia</th>
                <th>Horario</th>

                <th>Instrutor</th>

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

                <td align="center">
                    <a class="ui blue button" href="/curso/{{$dados->uuid}}"><i class="edit icon"></i></a>
                    @if($dados->inscritos === 0)
                    <a class="ui red button" href="/curso/lista/{{$dados->uuid}}"><i class="trash icon"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cursos->links('pagination::semantic-ui') }}
</div>

@endsection