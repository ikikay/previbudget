@extends('layout_back')

@section('title')
<h1>
    Modication d'un mouvement
    <small>- Modication d'un mouvement</small>
</h1>
@stop

@section('content')

@include('mouvement.form')

@stop


@section('script')
<script src="{{ url('js/perso/jsDeleteButton.js') }}"></script>

<script>
$(document).ready(function () {
    var type = "{{ $leMouvement->depense->id }}";
    $('select:first').val(type);
});
</script>
@stop