@extends('layouts.app')

@section('css')
<!-- Theme style -->
<link rel="stylesheet" href="{{ url('css/AdminLTE-2.4.5.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('S\'enregistrer') }}</div>

                <div class="card-body">

                    @include('user.form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection