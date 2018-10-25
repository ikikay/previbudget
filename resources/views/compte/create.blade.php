@extends('layout_back')

@section('title')
<h1>
    Enregistrement d'un utilisateur
    <small>- Enregistrement d'un utilisateur</small>
</h1>
@stop

@section('content')

{!! Form::open(['url' =>route('compte.store'),'method' =>'POST']) !!}

<input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
{!! Form::label('libelle', 'Libelle') !!}
{!! Form::text('libelle', "", ['class'=> 'form-control'] ) !!}

</br>

{!! Form::submit('Créer', ['class'=> 'btn bg-' . Auth::user()->color_item .' btn-lg btn-block']) !!}

{!! Form::close()!!}

@stop


@section('script')
@stop