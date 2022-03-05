@extends('layouts.app')

@section('content')


<div class="" >
    <select name="" id="chart-rate">
        <option value="1">{{ Lang::get('lang.GOLD')  }} | 999</option>
        <option value="2">{{ Lang::get('lang.GOLD')  }} | 958</option>
        <option value="3">{{ Lang::get('lang.GOLD')  }} | 916</option>
        <option value="4">{{ Lang::get('lang.GOLD')  }} | 875</option>
        <option value="5">{{ Lang::get('lang.GOLD')  }} | 750</option>
        <option value="6">{{ Lang::get('lang.GOLD')  }} | 585</option>
        <option value="7">{{ Lang::get('lang.GOLD')  }} | 416</option>
        <option value="8">{{ Lang::get('lang.GOLD')  }} | 375</option>
        <option value="9">{{ Lang::get('lang.GOLD')  }} | 333</option>
        <option value="10">{{ Lang::get('lang.SILVER')  }}</option>
        <option value="11">{{ Lang::get('lang.PLATINUM')  }}</option>
        <option value="12">{{ Lang::get('lang.PALLADIUM')  }}</option>
    </select>
    <select name="" id="chart-day-count">
        <option value="1">day</option>
        <option value="7">week</option>
        <option value="30">month</option>
        <option value="365">year</option>
    </select>
</div>
    <ul>
        <li><a href="{{route('lang', 'am')}}">am</a></li>
        <li><a href="{{route('lang', 'ru')}}">ru</a></li>
        <li><a href="{{route('lang', 'en')}}">en</a></li>
    </ul>


    <div class="container-chart">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-chart">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body-global">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/chart-min.js') }}"></script>
@endsection
