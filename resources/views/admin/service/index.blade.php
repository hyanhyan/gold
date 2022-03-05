@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(array('route' => 'service.store', 'method'=>'POST')) !!}
        @foreach($services as $key=> $service)
            <input type="checkbox" id="vehicle{{$key}}" name="services[]" value="{{$key}}" @if (in_array($key, $us)) checked @endif>
            <label for="vehicle{{$key}}">{{Lang::get('lang.' . $service)}}</label><br>
        @endforeach
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">{!! Lang::get('lang.CREATE') !!}</button>
    </div>
    {!! Form::close() !!}
@endsection
