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

                    <table class="table table-bordered table-responsive" >
                        <thead class="thead-inverse" >
                            <tr>
                                <th class="text-center" style="width: 25%">Mouvement</th>
                                @for ($i = 1; $i >= -6; $i--)
                                <th class="text-center" style="width: 9.375%">{{ $actualMonth->copy()->subMonth($i)->format('F') }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($leCompte->mouvements as $unMouvement)
                            <tr>

                                <td class="text-center"id="maintd{{ $unMouvement->id }}">
                                    <h4>{{ $unMouvement->libelle }}</h4>
                                </td>

                                @for ($i = 1; $i >= -6; $i--)
                                    @if ($unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id)
                                        @if ($unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->isEffectif())
                                            <td class="text-center"id="m{{ $actualMonth->copy()->subMonth($i)->month }}td{{ $unMouvement->id }}">
                                                {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->montant_effectif }}€
                                                <div class="row text-center">( {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->dte_effectif->format('d/m/Y') }} ) </div>
                                            </td>
                                        @else
                                            <td class="text-center"id="m{{ $actualMonth->copy()->subMonth($i)->month }}td{{ $unMouvement->id }}">
                                                {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->montant_previsionnel }}€
                                                <div class="row text-center">( {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->dte_previsionnel->format('d/m/Y') }} ) </div>
                                            </td>
                                        @endif
                                    @else
                                        <td class="text-center">                        
                                        </td>
                                    @endif
                                @endfor

                            </tr>
                            @endforeach

                            <tr>
                                <td class="text-center"id="maintd0">
                                    <h4> ... </h4>
                                </td>

                                <td class="text-center" colspan="8">
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