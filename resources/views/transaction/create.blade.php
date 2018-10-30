@extends('layout_back')

@section('css')

<link rel="stylesheet" href="{{url('css/bootstrap-datepicker3-1.8.0.min.css') }}" type="text/css">

@stop

@section('title')
<h1>
    Enregistrement d'une transaction
    <small>- Enregistrement d'une transaction</small>
</h1>
@stop

@section('content')

@include('transaction.form')

@stop


@section('script')
<!-- gijgo datepicker -->
<script src="{{url('js/bootstrap-datepicker3-1.8.0.min.js') }}"></script>

<script>
$(document).ready(function () {
    //Date picker
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1,
        format: "dd/mm/yyyy"};

    $('#datepicker').datepicker({
        autoclose: true,
        language: "fr"
    });
});

</script>
@stop