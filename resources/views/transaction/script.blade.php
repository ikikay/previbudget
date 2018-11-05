@section('script')
<!-- Pour edition seulement -->
<script src="{{ url('js/perso/jsDeleteButton.js') }}"></script>
<!-- gijgo datepicker -->
<script src="{{url('js/bootstrap-datepicker3-1.8.0.min.js') }}"></script>
<!-- bootstrap-slider -->
<script src="{{ url('js/bootstrap-slider.js') }}"></script>

<script>
$(document).ready(function () {
    //Date picker
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["di", "lu", "ma", "me", "je", "ve", "sa"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1,
        format: "dd/mm/yyyy"};

    $('.datepicker').datepicker({
        autoclose: true,
        language: "fr"
    });
    
    var moisPreselectionne = new Date();
    moisPreselectionne.setDate({{ $jours }});
    moisPreselectionne.setMonth({{ $mois }} -1);
    moisPreselectionne.setFullYear({{ $annee }});
    $(".datepicker").datepicker("update", moisPreselectionne);
    
    $('#nbrMoisSlider').slider({
        formatter: function (value) {
            return 'Nombres de mois : ' + value;
        }
    });

    $("#nbrMoisSlider").slider();
    $("#nbrMoisSlider").on("slide", function (slideEvt) {
        $("#nbrMoisSliderspan").text(slideEvt.value);
    });
   
});

$(document).on('click', '#input_datepicker_previsionnel', (function () {
    $('#datepicker_previsionnel').focus();
}));
$(document).on('click', '#input_datepicker_effectif', (function () {
    $('#datepicker_effectif').focus();
}));

</script>
@stop