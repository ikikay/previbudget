@extends('layout_back')

@include('transaction.css')

@section('title')
<h1>
    Modication d'une transaction
    <small>- Modication d'une transaction</small>
</h1>
@stop

@section('content')

@include('transaction.form')

@stop

@include('transaction.script')
