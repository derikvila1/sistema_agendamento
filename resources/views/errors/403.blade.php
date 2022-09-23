@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', ('403'))
@section('code', '403')
@section('message', ('Hmm, não deverias estar por aqui.'))
@section('submessage', '---')
@section('details', ('---'))
@section('datetime', (Carbon::now()))
