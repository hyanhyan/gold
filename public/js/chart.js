$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    sendRequest({rate_id:1, day_count:7,action : 'range'})


    function sendRequest(data){
        let chartUrl = $('#get-home-url').val();
        $.ajax({
            url : chartUrl,
            data : data,
            type : 'POST',
            success : function( data ){
                create_chart(data.success.local_list)
                create_chart_global(data.success.global_list)
            },
            error: function (data) {
                console.log(data)
            }
        });
    }

    $(' #submit-chart-calendar').on('click', function (){
       let rate_id = $('#chart-rate').val(),
           day_count = $('#chart-calendar').val(),
           data = {
                rate_id,
                day_count,
               action : 'day'
            };
       sendRequest(data);
    });

    $(' #chart-day-count #submit-day-count').on('click', function (){
        let rate_id = $('#chart-rate').val(),
            day_count = $('#chart-day-count select').val(),
            data = {
                rate_id,
                day_count,
                action : 'range'
            };
        sendRequest(data);
    });

    $('.action-btn>input').on('change', function (){
        let selfVal = $(this).val();
        if ('day' === selfVal){
            $('.chart-cal-all').css('display', 'none');
            $('#chart-day-count').css('display', 'block');
        }else {
            $('.chart-cal-all').css('display', 'block');
            $('#chart-day-count').css('display', 'none');
        }
       console.log();
    });


    function create_chart_global(data){
        let data_labels = [],
            data_price = [];

        data.forEach(function (item, index){
            data_labels[index] = item.created_at;
            data_price[index] = item.price;
        });

        let chartData = {
            labels: data_labels,
            datasets: [{
                label: 'Price',
                data: data_price,
                borderColor: 'red',
                backgroundColor: 'rgba(255,255,255,.2)',
                fill: false
            }]
        };

        //$('#chLine').remove();
        $('.card-body-global').html('<canvas id="chLineGlobal"> </canvas>');
        let chLineGlobal = $('#chLineGlobal');

        if (chLineGlobal) {
            new Chart(chLineGlobal, {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    tooltips: {
                        intersect: true,
                        mode: 'index',
                        axis: 'x'
                    }
                }
            });
        }


    }

    function create_chart(data){

        let data_labels = [],
            data_buys = [],
            data_sells = [];

        data.forEach(function (item, index){
            data_labels[index] = item.created_at;
            data_buys[index] = item.buy;
            data_sells[index] = item.sell;
        });

        let chartData = {
            labels: data_labels,
            datasets: [
                {
                    label: 'Sell',
                    data: data_sells,
                    borderColor: 'green',
                    fill: false,
                },{
                label: 'Buy',
                data: data_buys,
                borderColor: 'red',
                fill: false,
            }]
        };

        //$('#chLine').remove();
        $('.card-body').html('<canvas id="chLine"> </canvas>')
        let chLine = $('#chLine');

        if (chLine) {
            new Chart(chLine, {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    tooltips: {
                        intersect: false,
                        mode: 'index',
                        axis: 'x'
                    }
                }
            });
        }
    }
    $("#chart-calendar").dateDropdowns({
        minYear: 2021,
        required: true
    });

    function checkDay(){
        let day = $('.chart-cal-all .day>option:selected').val();

        if ('01' <= day && '08' >= day){
            $(".chart-cal-all .day").prop("selectedIndex", 0);
        }
    }

    $('.chart-cal-all .year').on('change', function (){
            if ('2021' === $(this).val()){
                $('.chart-cal-all .month>option:not(:first):lt(2)').attr('disabled', 'disabled').hide();
                let month = $('.chart-cal-all .month>option:selected').val();
                if ('01' === month || '02' === month){
                    $(".chart-cal-all .month").prop("selectedIndex", 0);
                }

                if ('03' === month){
                    checkDay();
                }else {
                    $('.chart-cal-all .day>option:not(:first):lt(8)').attr('disabled', false).show();
                }
            }else {
                $('.chart-cal-all .month>option:not(:first):lt(2)').prop('disabled',false).show();
            }
    });

    $('.chart-cal-all .month').on('change', function (){
        let year = $('.chart-cal-all .year>option:selected').val();
        if ('03' === $(this).val() && '2021' === year){
            $('.chart-cal-all .day>option:not(:first):lt(8)').attr('disabled', 'disabled').hide();
            checkDay();
        }else {
            $('.chart-cal-all .day>option:not(:first):lt(8)').attr('disabled', false).show();
        }




    });

    let self_chart = $('.container-chart');
    $(window).scroll(function(){
        let scrollPos = $(this).scrollTop();
        let scrollTitle = $('h2.scroll-text').position().top - 30;
        if (scrollPos > scrollTitle){
            self_chart.animate({scrollLeft: 446}, 25000)
            $(window).off('scroll');
        }
        // console.log(scrollTitle);
        // console.log(scrollPos);
    });

    self_chart.bind('touchstart', function (){
        $(this).stop();
    })



});








