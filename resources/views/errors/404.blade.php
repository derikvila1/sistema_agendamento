@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', ('404'))
@section('code', '404')
@section('message', ('Hmm, não há nada por aqui.'))
@section('submessage', 'Tem certeza do que procura?')
@section('details', ('Verifique se o endereço que deseja acessar está correto.'))
@section('datetime', (Carbon::now()))
