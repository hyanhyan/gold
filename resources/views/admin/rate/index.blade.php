@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="float: right;">
                <a class="btn @if($rateTime === '00') btn-danger @else btn-warning @endif" href="{{ route('actionTime', $rateTime) }}">@if ($rateTime === '00') Close @else Open @endif</a>
                <a class="btn btn-success" href="{{ route('rate.create') }}"> {!! Lang::get('lang.UPDATE').' ' !!}</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>{!! Lang::get('lang.METAL') !!}</th>
            <th>{!! Lang::get('lang.FINENESS') !!}</th>
            <th>{!! Lang::get('lang.BUY') !!}</th>
            <th>{!! Lang::get('lang.SELL') !!}</th>
        </tr>
        @foreach ($data as $key => $rate)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ Lang::get('lang.'.$metals[$rate->metal_id])  }}</td>
                <td>{{ $rate->purity }}</td>
                <td>{{ $rate->buy }}</td>
                <td>{{ $rate->sell }}</td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}
@endsection
