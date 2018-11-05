<?php
if ($laTransaction->id) {
    $lesOptions = ['method' => 'put', 'url' => route('transaction.update', $laTransaction->id)];
    $action = "Modifier";
    $edit = true;
} else {
    $lesOptions = ['method' => 'post', 'url' => route('transaction.store')];
    $action = "Créer";
    $edit = false;
}
$date = "dd/mm/yyyy";
?>
<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        {!! Form::model($laTransaction, $lesOptions) !!}

        <input id="mouvement_id" name="mouvement_id" value="{{ $mouvement_id }}" type="hidden" readonly>

        <div class="box box-warning">
            <div class="box-header with-border">
                <div class="box-body">

                    {!! Form::label('montant_previsionnel', 'Montant prévu') !!}
                    {!! Form::text('montant_previsionnel', null, ['class'=> 'form-control'] ) !!}

                    <div class="form-group">
                        <label>Date prévu</label>

                        <div class="input-group date" id="input_datepicker_previsionnel">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" id="datepicker_previsionnel" name="dte_previsionnel" value="{{$date}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <div class="box-body">

                    {!! Form::label('montant_effectif', 'Montant éffectué') !!}
                    {!! Form::text('montant_effectif', null, ['class'=> 'form-control'] ) !!}

                    <div class="form-group">
                        <label>Date éffectué</label>

                        <div class="input-group date">
                            <div class="input-group-addon" id="input_datepicker_effectif">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" id="datepicker_effectif" name="dte_effectif" value="{{$date}}">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @if (!$edit)
        <div class="box box-info">
            <div class="box-header with-border">
                <div class="box-body">

                    <span id="nbrMoisSliderlabel">Nombres de mois : <span id="nbrMoisSliderspan">1</span></span>
                    <input id="nbrMoisSlider" name="nbrMois" type="text" data-slider-min="1" data-slider-max="12" data-slider-step="1" data-slider-value="1" data-slider-ticks="[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]" />

                </div>
            </div>
        </div>
        @endif

        {!! Form::submit($action, ['class'=> 'btn bg-' . $auth->color->color_item .' btn-lg btn-block']) !!}

        {!! Form::close()!!}

        @if ($edit)
        {!! Form::open(['route' => ["transaction.destroy", $laTransaction->id], 'method' => 'delete']) !!}
        {!! Form::submit("Supprimer", ['class'=> 'jsDeleteButton btn btn-block btn-danger btn-lg']) !!}
        {!! Form::close() !!}
        @endif
    </div>
</div>