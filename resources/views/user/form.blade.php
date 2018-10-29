<?php
if (Auth::user()) {
    if ($leUser->id) {
        $lesOptions = ['method' => 'put', 'url' => route('user.update', $leUser->id)];
        $action = "Modifier";
    } else {
        $lesOptions = ['method' => 'post', 'url' => route('user.store')];
        $action = "Créer";
    }
} else {
    $lesOptions = ['method' => 'post', 'url' => route('register')];
    $action = "S'inscrire";
}
?>

{!! Form::model($leUser, $lesOptions) !!}

{!! Form::label('pseudo', 'Pseudo') !!}
{!! Form::text('pseudo', null,['class'=> 'form-control'] ) !!}

{!! Form::label('nom', 'Nom') !!}
{!! Form::text('nom', null,['class'=> 'form-control'] ) !!}

{!! Form::label('prenom', 'Prenom') !!}
{!! Form::text('prenom', null,['class'=> 'form-control'] ) !!}

{!! Form::label('email', 'E-mail') !!}
{!! Form::text('email', null,['class'=> 'form-control'] ) !!}

{!! Form::label('password', 'Mot de passe') !!}
<input id="password" type="password" class="form-control" name="password" value="">

{!! Form::label('password-confirm', 'Confirmation du mot de passe') !!}
<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

<div class="form-group">
    <label for="color_id" class="form-label">Couleur</label>

    <select name="color_id" class="form-control select2" style="width: 100%;">
        @foreach($lesCouleurs as $uneCouleur)
        <option class="bg-{{ $uneCouleur->color_theme }}" value="{{ $uneCouleur->id }}">{{ $uneCouleur->name }}</option>
        @endforeach
    </select>

</div>

</br>

{!! Form::submit($action, ['class'=> 'btn bg-blue btn-lg btn-block']) !!}

{!! Form::close()!!}