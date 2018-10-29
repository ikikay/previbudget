@extends('layout_back')

@section('title')
<h1>
    Administration des utilisateurs
    <small>- Rechercher, Modifier et Supprimer des utilisateurs</small>
</h1>
@stop

@section('content')

<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <!-- search form (Optional) -->
                    <form action="#" method="get">
                        <div class="input-group margin">
                            <input type="text" name="q" class="form-control" placeholder="Rechercher . . .">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn bg-{{ Auth::user()->color->color_item }} btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <table class="table table-bordered" >
                        <thead class="thead-inverse" >
                            <tr>

                                <th class="text-center">Pseudo</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prenom</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tab_users as $unUser)
                            <tr>

                                <td class="col-md-3 text-center"  id="maintd{{ $unUser["id"] }}">
                                    <h4> {{ $unUser["pseudo"] }}</h4>
                                </td>

                                <td class="col-md-2 text-center"  id="nomtd{{ $unUser["id"] }}">
                                    <h4> {{ $unUser["nom"] }}</h4>
                                </td>

                                <td class="col-md-2 text-center"  id="prenomtd{{ $unUser["id"] }}">
                                    <h4> {{ $unUser["prenom"] }}</h4>
                                </td>

                                <td class="col-md-3 text-center"  id="emailtd{{ $unUser["id"] }}">
                                    <h4> {{ $unUser["email"] }}</h4>
                                </td>

                                <td class="col-md-2 text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::open(['route' => ["user.edit", $unUser->id], 'method' => 'get']) !!}
                                            <button type="submit" class="btn btn-circle"><i class="fa fa-list"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(['route' => ["user.destroy", $unUser->id], 'method' => 'delete', 'id' => "form".$unUser->id]) !!}
                                            <button type="submit" id="{{ $unUser->id }}" class="jsDeleteButton btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="col-md-3 text-center"  id="maintd0}}">
                                    <h4> ... </h4>
                                </td>

                                <td class="col-md-9 text-center" colspan="4">
                                    {!! Form::open(['route' => "user.create", 'method' => 'get']) !!}
                                    <button type="submit" class="btn bg-{{ Auth::user()->color->color_item }} btn-lg btn-block">Nouveau utilisateur</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </tbody> 
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')

<script src="{{ url('js/perso/jsDeleteButton.js') }}"></script>

@stop