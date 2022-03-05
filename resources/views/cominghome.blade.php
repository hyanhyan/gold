@extends('layouts.app')

@section('content')
    <div class="product_table currency-inner">
        <div id="main-chart-coming">
            <div style="width: 100%">
                <div class="d-md-flex justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-7  col-sm-12">

                        <div class="dFlex w100 align-center justify-between tel">
                            <div class="dFlex align-center">
                                <a href="tel:044 999 585">
                                    <img src="images/viber.png" alt="">
                                </a>
                                <a href="tel:044 999 585">
                                    <img src="images/whatsapp.png" alt="">
                                </a>
                                <a href="tel:044 999 585">044 999 585</a>
                            </div>
                            <div>
                                <p>
                                    09.25.2021
                                </p>
                            </div>

                        </div>
                        <div class="currency w100">

                        <table id="local-table" class="w100">
                            <thead>
                            <tr class="table-active">
                                <th scope="col">{{ Lang::get('lang.GOLD')  }}</th>
                                <th scope="col">Buy</th>
                                <th scope="col">Sell</th>
                                <th class="pl-0 pr-0" scope="col">+\-</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
{{--                        <h2 class="scroll-text text-center">The World Spot Price</h2>--}}
{{--                        <table id="global-table" class="table-sm table-bordered table-striped align-middle text-center mt-2">--}}
{{--                            <thead>--}}
{{--                            <tr class="table-active">--}}
{{--                                <th scope="col">Metals</th>--}}
{{--                                <th scope="col">Price</th>--}}
{{--                                <th class="pl-0 pr-0" scope="col">+\-</th>--}}
{{--                                <th scope="col">Time</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}


                    </div>
                    <br>
                    <div class="col-xl-8 col-lg-6 col-md-5  col-sm-12">
                        <div class="chart-action-form" >
                            <div class="d-flex flex-wrap ">
                                <select name="" id="chart-rate" >
                                    <option value="1" selected>{{ Lang::get('lang.GOLD')  }} | 999</option>
                                    <option value="2">{{ Lang::get('lang.GOLD')  }} | 995</option>
                                    <option value="3">{{ Lang::get('lang.GOLD')  }} | 958</option>
                                    <option value="4">{{ Lang::get('lang.GOLD')  }} | 916</option>
                                    <option value="5">{{ Lang::get('lang.GOLD')  }} | 875</option>
                                    <option value="6">{{ Lang::get('lang.GOLD')  }} | 750</option>
                                    <option value="7" >{{ Lang::get('lang.GOLD')  }} | 585</option>
                                    <option value="8">{{ Lang::get('lang.GOLD')  }} | 416</option>
                                    <option value="9">{{ Lang::get('lang.GOLD')  }} | 375</option>
                                    <option value="10">{{ Lang::get('lang.GOLD')  }} | 333</option>
                                    <option value="12">{{ Lang::get('lang.SILVER')  }} | 995</option>
                                    <option value="13">{{ Lang::get('lang.SILVER')  }} | 999</option>
                                    {{--<option value="14">{{ Lang::get('lang.PLATINUM')  }}</option>
                                    <option value="15">{{ Lang::get('lang.PALLADIUM')  }}</option>--}}
                                </select>
                                <div class="action-btn">
                                    <label for="range-btn" class="mr-1">Day </label> <input type="radio" id="range-btn" name="action" checked value="range">
                                    <label for="day-btn" class="ml-2 mr-1">Range </label> <input type="radio" id="day-btn" name="action" value="day">
                                </div>
                                <div class="chart-cal-all">
                                    <input type="hidden" id="chart-calendar">
                                    <button id="submit-chart-calendar">submit</button>
                                </div>
                                <div id="chart-day-count">
                                    <select name="" >
                                        <option  value="1">day</option>
                                        <option selected value="7">week</option>
                                        <option value="30">month</option>
                                        <option value="365">year</option>
                                    </select>
                                    <button id="submit-day-count">submit</button>
                                </div>

                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/chart-min.js?v=' . time()) }}"></script>
    <script src="{{ asset('/js/date-dropdowns.min.js?v=' . time()) }}"></script>
    <script src="{{ asset('/js/chart.js') }}?v=time()"></script>

@endsection

