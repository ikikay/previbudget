@extends('layout_back')

@section('title')
<h1>
    Modication d'un utilisateur
    <small>- Modication d'un utilisateur</small>
</h1>
@stop
@section('content')

{!! Form::open(['url' =>route('user.update',$leUser->id),'method' =>'put']) !!}

{!! Form::label('pseudo', 'Pseudo') !!}
{!! Form::text('pseudo', $leUser->pseudo,['class'=> 'form-control'] ) !!}

{!! Form::label('nom', 'Nom') !!}
{!! Form::text('nom', $leUser->nom,['class'=> 'form-control'] ) !!}

{!! Form::label('prenom', 'Prenom') !!}
{!! Form::text('prenom', $leUser->prenom,['class'=> 'form-control'] ) !!}

{!! Form::label('email', 'E-mail') !!}
{!! Form::text('email', $leUser->email,['class'=> 'form-control'] ) !!}

{!! Form::label('password', 'Mot de passe') !!}
<input id="password" type="password" class="form-control" name="password" value="" >

<div class="form-group">
    <label for="color" class="form-label">Couleur</label>

    <select name="color" class="form-control select2" style="width: 100%;" required>
        <option class="bg-light-blue" value="blue">Bleu</option>
        <option class="bg-green" value="green">Vert</option>
        <option class="bg-yellow" value="yellow">Jaune</option>
        <option class="bg-red" value="red">Rouge</option>
        <option class="bg-purple" value="purple">Violet</option>
        <option class="bg-black" value="black">Noir</option>
    </select>
</div>

</br>

{!! Form::submit('Valider', ['class'=> 'btn bg-' . Auth::user()->color_item .' btn-lg btn-block']) !!}

{!! Form::close()!!}
@stop