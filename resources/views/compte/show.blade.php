@extends('layout_back')

@section('css')
<link rel="stylesheet" href="{{url('css/compte/show.css') }}" >
@stop

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

                    <table class="table table-bordered table-hover" style="table-layout: fixed">
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
                                <th class="text-center" style="width: 20%">
                                    <div classe ="row">&nbsp</div>
                                    <div classe ="row">Total Revenus</div>

                                </th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">
                                    <div classe ="row"><p class="text-yellow">{{ $leCompte->sommeRevenusPrevisionnelDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-green">{{ $leCompte->sommeRevenusEffectifDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-muted">{{ $leCompte->sommeRevenusDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                </th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesFixes])
                            <tr>
                                <th class="text-center" style="width: 20%">
                                    <div classe ="row">&nbsp</div>
                                    <div classe ="row">Total Depenses Fixes</div>

                                </th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">
                                    <div classe ="row"><p class="text-yellow">{{ $leCompte->sommeDepensesFixesPrevisionnelDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-green">{{ $leCompte->sommeDepensesFixesEffectifDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-muted">{{ $leCompte->sommeDepensesFixesDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                </th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesVariables])
                            <tr>
                                <th class="text-center" style="width: 20%">
                                    <div classe ="row">&nbsp</div>
                                    <div classe ="row">Total Depenses Variables</div>
                                </th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">
                                    <div classe ="row"><p class="text-yellow">{{ $leCompte->sommeDepensesVariablePrevisionnelDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-green">{{ $leCompte->sommeDepensesVariableEffectifDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-muted">{{ $leCompte->sommeDepensesVariableDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                </th>
                                @endfor
                            </tr>

                            @include('compte.array', ['lesMouvements' => $lesMouvementsDepensesOccasionnelles])
                            <tr>
                                <th class="text-center" style="width: 20%">
                                    <div classe ="row">&nbsp</div>
                                    <div classe ="row">Total Depenses Occasionnelles</div>                                  
                                </th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">
                                    <div classe ="row"><p class="text-yellow">{{ $leCompte->sommeDepensesOccasionnellesPrevisionnelDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-green">{{ $leCompte->sommeDepensesOccasionnellesEffectifDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-muted">{{ $leCompte->sommeDepensesOccasionnellesDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                </th>
                                @endfor
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 20%">
                                    <div classe ="row">&nbsp</div>
                                    <div classe ="row">Total</div>
                                </th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">
                                    <div classe ="row"><p class="text-yellow">{{ $leCompte->sommeTotalPrevisionnelDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-green">{{ $leCompte->sommeTotalEffectifDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                    <div classe ="row"><p class="text-muted">{{ $leCompte->sommeTotalDuMois($actualMonth->copy()->subMonth($i)) }}€</p></div>
                                </th>
                                @endfor
                            </tr>

                        </tbody>
                        <thead class="thead-inverse" >
                            <tr>
                                <th class="text-center" style="width: 20%">Mouvement</th>
                                @for ($i = 1; $i >= $nbrBoucle; $i--)
                                <th class="text-center" style="width: 10%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                                @endfor
                            </tr>

                            <tr>
                                <td class="text-center" colspan="9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::open(['route' => "mouvement.create", 'method' => 'get']) !!}
                                            <input id="compte_id" name="compte_id" value="{{ $leCompte->id }}" type="hidden" readonly>
                                            <button type="submit" class="btn bg-{{ $auth->color->color_item }} btn-lg btn-block">Nouveau mouvement</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('script')

@stop