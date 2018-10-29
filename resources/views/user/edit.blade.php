@extends('layout_back')

@section('title')
<h1>
    Modication d'un utilisateur
    <small>- Modication d'un utilisateur</small>
</h1>
@stop
@section('content')

<?php 
    $color = "1";
    if($leUser->id){   
        $color = $leUser->color->id;
    }
?>
@include('user.form')

@stop


@section('script')
<script>
    $(document).ready(function () {
        var couleur = "{{ $color }}";
        $('select:first').val(couleur);
        $('#password').val("");
    });
</script>
@stop