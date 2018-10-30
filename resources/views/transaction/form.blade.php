<?php
if ($laTransaction->id) {
    $lesOptions = ['method' => 'put', 'url' => route('transaction.update', $laTransaction->mouvement->id)];
    $action = "Modifier";
} else {
    $lesOptions = ['method' => 'post', 'url' => route('transaction.store', $leMouvement->id)];
    $action = "Créer";
}
?>

{!! Form::model($laTransaction, $lesOptions) !!}

{!! Form::label('montant_previsionnel', 'Montant prévu') !!}
{!! Form::text('montant_previsionnel', null, ['class'=> 'form-control'] ) !!}

<div class="form-group">
    <label>Date prévu</label>

    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker">
    </div>
</div>

</br>

{!! Form::submit($action, ['class'=> 'btn bg-' . $auth->color->color_item .' btn-lg btn-block']) !!}

{!! Form::close()!!}