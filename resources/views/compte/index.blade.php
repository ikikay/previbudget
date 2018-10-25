@extends('layout_back')

@section('title')
<h1>
    Administration des comptes
    <small>- Rechercher, Modifier et Supprimer des comptes</small>
</h1>
@stop

@section('content')

<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                {!! Form::open(['route' => "compte.create", 'method' => 'get']) !!}
                <button type="submit" class="btn bg-{{ Auth::user()->color_item }} btn-lg btn-block">Créer un compte</button>
                {!! Form::close() !!}
                <!-- /.box-header -->
                <div class="box-body">

                    <!-- search form (Optional) -->
                    <form action="#" method="get">
                        <div class="input-group margin">
                            <input type="text" name="q" class="form-control" placeholder="Rechercher . . .">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn bg-{{ Auth::user()->color_item }} btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <table class="table table-bordered" >
                        <thead class="thead-inverse" >
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tab_comptes as $unCompte)
                            <tr>

                                <td class="col-md-10 text-center"  id="maintd{{ $unCompte["id"] }}">
                                    <h4> {{ $unCompte["libelle"] }}</h4>
                                </td>

                                <td class="col-md-2 text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::open(['route' => ["compte.edit", $unCompte->id], 'method' => 'get']) !!}
                                            <button type="submit" class="btn bg-{{ Auth::user()->color_item }}  btn-circle"><i class="fa fa-list"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(['route' => ["compte.destroy", $unCompte->id], 'method' => 'delete', 'id' => "form".$unCompte->id]) !!}
                                            <button type="submit" id="{{ $unCompte->id }}" class="jsDeleteButton btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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