@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    {!! Form::open(array('route' => 'rate.store','method'=>'POST')) !!}
        <div class="col-xs-12 col-sm-12 col-md-12 text-right m-b-md">
            <button type="submit" class="btn btn-primary w-sm">{!! Lang::get('lang.UPDATE') !!}</button>
        </div>
        <table class="table table-bordered w-75 mx-auto ">
            <tr class="text-center">
                <th >No</th>
                <th >{!! Lang::get('lang.METAL') !!}</th>
                <th >{!! Lang::get('lang.FINENESS') !!}</th>
                <th >{!! Lang::get('lang.BUY') !!}</th>
                <th >{!! Lang::get('lang.SELL') !!}</th>
            </tr>

            @foreach ($data as $key => $rate)
                <tr class="text-center">
                    <td >{{ ++$i }}</td>
                    <td >{{ Lang::get('lang.'. $metals[$rate->metal_id])  }}</td>
                    <td >{{ $rate->purity }}</td>
                    <td >{!! Form::text($rate->id.'[buy]', $rate->buy, array('class' => 'form-control w-50  mx-auto', 'id' =>    $rate->metal_id == 1 ?  'b'.$rate->purity : "")) !!}</td>
                    <td >{!! Form::text($rate->id.'[sell]', $rate->sell, array('class' => 'form-control w-50  mx-auto',  'id' => $rate->metal_id == 1 ? 's'.$rate->purity : "")) !!}</td>
                </tr>
            @endforeach
        </table>

    {!! Form::close() !!}
@endsection
