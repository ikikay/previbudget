@extends('layout_back')

@section('title')
<h1>
    Modication d'un utilisateur
    <small>- Modication d'un utilisateur</small>
</h1>
@stop
@section('content')

<?php 
    $color = "blue";
    if($leUser->id){   
        $color = $leUser->color->color_theme;
    }
?>
@include('user.form')

@stop


@section('script')
<script>
    $(document).ready(function () {
        var couleur = "{{ $color }}";
        console.log("Selection automatique de {{ $color }}");
        $('select:first').val(couleur);
    });
</script>
@stop