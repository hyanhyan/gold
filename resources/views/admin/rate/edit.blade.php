@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
    {!! Form::model($rate, ['method' => 'PATCH','route' => ['rate.update']]) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.METAL') !!}:</strong>
                {!! Form::select('metal_id', $metals,$rate->metal_id, array('class' => 'form-control', 'disabled' => true)) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.FINENESS') !!}:</strong>
                {!! Form::text('purity', null, array('placeholder' => 'purity','class' => 'form-control', 'readonly')) !!}
            </div>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.BUY') !!}:</strong>
                {!! Form::number('buy', null, array('placeholder' => 'buy','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.SELL') !!}:</strong>
                {!! Form::number('sell', null, array('placeholder' => 'sell','class' => 'form-control')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="submit" class="btn btn-primary">{!! Lang::get('lang.UPDATE') !!}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
