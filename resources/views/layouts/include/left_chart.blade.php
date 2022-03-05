
        <div class="currency-inner">


        <div id="main-chart-coming">
            <div class="dFlex w100 align-center justify-between tel">
                <div class="dFlex align-center">
                    <a  href="viber://chat?number=%2B37444999585">
                                    <img src="images/viber.png" alt="">
                            </a>
                            <div>
                                <a href="tel:044 999 585">044 999 585</a>

                                <a  href="https://api.whatsapp.com/send?phone=+37444999585">
                                    <img src="images/whatsapp.png" alt=""></a>
                                </a>
                                <a href="tel:044 999 585">044 999 585</a>
                            </div>
                </div>
                <div>
                    <p>
                        {{date("Y-m-d")}}
                    </p>
                </div>
            </div>
            <div class="slc-open-chart slc-short-chart">

            <a href="{{route('chart')}}" class="currency w100">
                <table class="w100" id="local-table">
                    <thead>
                    <tr class="tb-title">
                        <th>{{ Lang::get('lang.GOLD')  }}</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th >+/-</th>
                        <th>TIME</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                 </table>
                <div class="dFlex justify-center vec">
                    <div>
                        <img src="{{asset('images/currencyvec.png')}}" alt="">
                    </div>
                </div>
            </a>
            </div>
        </div>
        </div>




        <script src="{{ asset('/js/chart-min.js') }}"></script>
        <script src="{{ asset('/js/date-dropdowns.min.js') }}"></script>


