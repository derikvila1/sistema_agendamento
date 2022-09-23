@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection


@section('content')
<br>

@foreach($result as $dados)

@endforeach


<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Início</h1>


<form class="ui form container" action="/dashboard" method="POST" enctype="multipart/form-data">
    <h1>Para habilitar ou desabilitar o sistema de matricula use o botão abaixo</h1>
    @csrf
    <div style=" padding: 1rem;">

      <button class="ui button" style=" padding: 1rem;"  id="botao-enviar" type="submit"> {{$dados ? 'HABILITAR' : 'DESABILITAR'}}</button>
    </div>

  </form>
@endsection
 
