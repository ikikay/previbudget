@extends('layout_back')

@include('transaction.css')

@section('title')
<h1>
    Modication d'une transaction
    <small>- {{ $laTransaction->mouvement->libelle }}</small>
</h1>
@stop

@section('content')

@include('transaction.form')

@stop

@include('transaction.script')
