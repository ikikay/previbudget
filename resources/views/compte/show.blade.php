@extends('layout_back')

@section('title')
<h1>
    Aperçu du compte
    <small>- {{ $leCompte->libelle }}</small>
</h1>
@stop

@section('content')

<?php 
$nbrBoucle = -6;
?>

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
                                <button type="submit" name="search" id="search-btn" class="btn bg-{{ $auth->color->color_item }} btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <table class="table table-bordered" style="table-layout: fixed">
                        <thead class="thead-inverse" >
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            
                            @include('compte.array', ['lesMouvements' => $lesMouvementsRevenus])
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                            </tr>
                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesFixes])
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                            </tr>
                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesVariables])
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                            </tr>
                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesOccasionnelles])
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                            </tr>

                            <tr>
                                <td class="text-center"id="maintd0">
                                    <h4> ... </h4>
                                </td>

                                <td class="text-center" colspan="8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::open(['route' => ["mouvement.create", $leCompte->id], 'method' => 'get']) !!}
                                            <button type="submit" class="btn bg-{{ $auth->color->color_item }} btn-lg btn-block">Nouveau mouvement</button>
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