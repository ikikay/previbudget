@foreach ($lesMouvements as $unMouvement)
<tr>

    <td class="text-center"id="maintd{{ $unMouvement->id }}">
        {{ $unMouvement->libelle }}
    </td>

    @for ($i = 1; $i >= -6; $i--)
    @if ($unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id)
    @if ($unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->isEffectif())
    <td class="text-center"id="m{{ $actualMonth->copy()->subMonth($i)->month }}td{{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id }}">
        {!! Form::open(['route' => ["transaction.edit", $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id], 'method' => 'get']) !!}
        <button type="submit" class="btn bg-olive btn-lg btn-block">
            <h6>             
                <div classe ="row">{{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->montant_effectif }}€</div>
                <div classe ="row">le {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->dte_effectif->format('d') }}</div>
            </h6>
        </button>
        {!! Form::close() !!}
    </td>
    @else
    <td class="text-center"id="m{{ $actualMonth->copy()->subMonth($i)->month }}td{{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id }}">
        {!! Form::open(['route' => ["transaction.edit", $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->id], 'method' => 'get']) !!}
        <button type="submit" class="btn bg-orange btn-lg btn-block">
            <h6>
                <div classe ="row">{{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->montant_previsionnel }}€</div>
                <div classe ="row">le {{ $unMouvement->transactionDuMois($actualMonth->copy()->subMonth($i))->dte_previsionnel->format('d') }}</div>
            </h6>
        </button>
        {!! Form::close() !!}
    </td>
    @endif
    @else
    <td class="text-center">   
        {!! Form::open(['route' => "user.create", 'method' => 'get']) !!}
        <button type="submit" class="btn btn-lg btn-block">
            <h6>
                <div classe ="row">&nbsp</div>
                <div classe ="row">&nbsp</div>
            </h6>
        </button>
        {!! Form::close() !!}
    </td>
    @endif
    @endfor

</tr>
@endforeach