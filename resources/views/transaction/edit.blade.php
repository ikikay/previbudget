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

@section('script')
<script src="{{ url('js/perso/jsDeleteButton.js') }}"></script>
@stop
@include('transaction.script')
