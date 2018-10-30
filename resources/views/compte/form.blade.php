<?php
if ($leCompte->id) {
    $lesOptions = ['method' => 'put', 'url' => route('compte.update', $leCompte->id)];
    $action = "Modifier";
} else {
    $lesOptions = ['method' => 'post', 'url' => route('compte.store')];
    $action = "Créer";
}
?>

{!! Form::model($leCompte, $lesOptions) !!}

{!! Form::label('libelle', 'Libelle') !!}
{!! Form::text('libelle', null, ['class'=> 'form-control'] ) !!}

</br>

{!! Form::submit($action, ['class'=> 'btn bg-' . $auth->color->color_item .' btn-lg btn-block']) !!}

{!! Form::close()!!}