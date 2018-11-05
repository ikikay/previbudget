<?php
if ($leMouvement->id) {
    $lesOptions = ['method' => 'put', 'url' => route('mouvement.update', $leMouvement->id)];
    $action = "Modifier";
    $edit = true;
} else {
    $lesOptions = ['method' => 'post', 'url' => route('mouvement.store')];
    $action = "Créer";
    $edit = false;
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

@if ($edit)
{!! Form::open(['route' => ["mouvement.destroy", $leMouvement->id], 'method' => 'delete']) !!}
{!! Form::submit("Supprimer", ['class'=> 'jsDeleteButton btn btn-block btn-danger btn-lg']) !!}
{!! Form::close() !!}
@endif