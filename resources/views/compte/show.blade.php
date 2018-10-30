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
                                <th class="text-center" style="width: 20%">Total Revenus</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $leCompte->sommeRevenusDuMois($actualMonth->copy()->subMonth($i)) }}€</th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesFixes])
                            <tr>
                                <th class="text-center" style="width: 20%">Total Depenses Fixes</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $leCompte->sommeDepensesFixesDuMois($actualMonth->copy()->subMonth($i)) }}€</th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesVariables])
                            <tr>
                                <th class="text-center" style="width: 20%">Total Depenses Variables</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $leCompte->sommeDepensesVariableDuMois($actualMonth->copy()->subMonth($i)) }}€</th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesOccasionnelles])
                            <tr>
                                <th class="text-center" style="width: 20%">Total Depenses Occasionnelles</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $leCompte->sommeDepensesOccasionnellesDuMois($actualMonth->copy()->subMonth($i)) }}€</th>
                                @endfor
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 20%">Total</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $leCompte->sommeTotalDuMois($actualMonth->copy()->subMonth($i)) }}€</th>
                                @endfor
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