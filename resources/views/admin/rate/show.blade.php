@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Հարգը:</strong>
                {{ $rate->purity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Առք:</strong>
                {{ $rate->buy }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Վաճառք:</strong>
                {{ $rate->sell }}
            </div>
        </div>

    </div>
@endsection
