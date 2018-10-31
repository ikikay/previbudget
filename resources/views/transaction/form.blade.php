<?php
if ($laTransaction->id) {
    $lesOptions = ['method' => 'put', 'url' => route('transaction.update', $laTransaction->id)];
    $action = "Modifier";
} else {
    $lesOptions = ['method' => 'post', 'url' => route('transaction.store')];
    $action = "Créer";
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

        {!! Form::submit($action, ['class'=> 'btn bg-' . $auth->color->color_item .' btn-lg btn-block']) !!}

        {!! Form::close()!!}
    </div>
</div>