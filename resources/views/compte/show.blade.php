@extends('layout_back')

@section('title')
<h1>
    Aperçu du compte
    <small>- {{ $leCompte->libelle }}</small>
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
                                <th class="text-center">Mouvement</th>
                                <th class="text-center">Mois n-1</th>
                                <th class="text-center">{{ $now->format('F') }}</th>
                                <th class="text-center">Mois n+1</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($leCompte->mouvements as $unMouvement)
                            {{ $unMouvement->libelle }}
                            @endforeach

                            <tr>
                                <td class="col-md-3 text-center"id="maintd0">
                                    <h4> ... </h4>
                                </td>

                                <td class="col-md-9 text-center" colspan="3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::open(['route' => "mouvement.create", 'method' => 'get']) !!}
                                            <button type="submit" class="btn bg-{{ Auth::user()->color->color_item }} btn-lg btn-block">Nouveau mouvement</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
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

@stop