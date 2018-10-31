<?php
if ($leMouvement->id) {
    $lesOptions = ['method' => 'put', 'url' => route('mouvement.update', $leMouvement->id)];
    $action = "Modifier";
} else {
    $lesOptions = ['method' => 'post', 'url' => route('mouvement.store')];
    $action = "Créer";
}
?>

{!! Form::model($leMouvement, $lesOptions) !!}

<input id="compte_id" name="compte_id" value="{{ $compte_id }}" type="hidden" readonly>

{!! Form::label('libelle', 'Libelle') !!}
{!! Form::text('libelle', null, ['class'=> 'form-control'] ) !!}

<div class="form-group">
    <label for="depense_id" class="form-label">Type</label>

    <select name="depense_id" class="form-control select2" style="width: 100%;">
        @foreach($lesDepenses as $uneDepense)
        <option value="{{ $uneDepense->id }}">{{ $uneDepense->name }}</option>
        @endforeach
    </select>

</div>

</br>

{!! Form::submit($action, ['class'=> 'btn bg-' . $auth->color->color_item .' btn-lg btn-block']) !!}

{!! Form::close()!!}