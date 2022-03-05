$(document).ready(function ($) {


    $('.multiple-items').slick({

        dots: false,

        infinite: false,

        speed: 300,

        // rows: 2,

        slidesToShow: 3,

        // autoplay:true,

        slidesToScroll: 1,

        responsive: [

            {

                breakpoint: 1025,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: false,

                    dots: false

                }

            },

            {

                breakpoint: 998,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1,

                }

            },

            {

                breakpoint: 768,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1

                }

            }

        ]

    });


    $('.newAdded').slick({

        dots: false,

        infinite: false,

        speed: 300,

        slidesToShow: 4,

        // autoplay:true,

        slidesToScroll: 1,

        responsive: [

            {

                breakpoint: 1025,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: false,

                    dots: false

                }

            },

            {

                breakpoint: 998,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1,

                }

            },

            {

                breakpoint: 768,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1

                }

            }

        ]

    });


    let mega_menu = $('.mega-menu')
    $('.dropdown-content ul.man').hover(function () {
        mega_menu.removeClass('man');
        mega_menu.removeClass('women');
        mega_menu.removeClass('children');
        $(this).parents('.mega-menu').addClass('man');
    });
    $('.dropdown-content ul.women ').hover(function () {
        mega_menu.removeClass('women');
        mega_menu.removeClass('man');
        mega_menu.removeClass('children');
        $(this).parents('.mega-menu').addClass('women');
    });
    $('.dropdown-content ul.children ').hover(function () {
        mega_menu.removeClass('children');
        mega_menu.removeClass('women');
        mega_menu.removeClass('man');
        $(this).parents('.mega-menu').addClass('children');

    });
    // $('.dropdown').hover(function (){
    //     $(this).children('.mega-menu').addClass('children');
    // })
    $('.home_content_tabs button[aria-pressed="false"]').click(function () {
        $(".home_container").toggleClass("region");
    });
    $('.home_content_tabs .btn-toggle').on('click', function () {

        $(this).toggleClass('active_btn');
        let find = $(this).hasClass('active_btn');
        if (find) {
            $('.shopping_center_content').show();
            $('.collection_content').hide();
        } else {
            $('.shopping_center_content').hide();
            $('.collection_content').show();
        }
        $('.multiple-items').slick('refresh');
    });
    // $(document).delegate( ".home_content_tabs .btn-toggle", "click", function() {q
    // });
    $('.modal-toggle').on('click', function (e) {
        e.preventDefault();
        $('.modal').toggleClass('is-visible');
    });
    $('.modal-login-toggle').on('click', function (e) {
        e.preventDefault();
        $('.modal-login').toggleClass('is-visible');
        $('.mySellection').css('display','none');
    });
    $('.changeSize-modal-toggle').on('click', function (e) {
        e.preventDefault();
        $('.changeSize').toggleClass('is-visible');
    });
    $('.makeOffer-modal-toggle').on('click', function (e) {
        e.preventDefault();
        $('.makeOffer').toggleClass('is-visible');
    });
    $('.makeOffer_next').on('click', function () {
        let val = $('.offer-old-price').val();
        $('.your-offer').text(val + '$');
        $('.offer-price').val(val);

        $('.makeOffer_none').hide();
        $('.makeOffer_block').show();
    });
    $('.makeOffer_block').on('click', function () {
        $('.makeOffer_none').show();
        $('.makeOffer_block').hide();
    });

    $(".search_input").on('click', function () {
        $(".search_result").show();
    });
    $(".sortable-link").on('click', function () {
        $(this).find('input').change();
    });
    // $("body:not(.search_input)").on('click', function (){
    //     $(".search_result").hide();
    // })

    $('.log_reg_toggle p').on('click', function () {
        $('.log_reg_toggle p').removeClass('active_log');
        $(this).addClass('active_log');
        if ($('.sign_in').hasClass('active_log')) {
            $('.sign_in_content').addClass('active');
        } else {
            $('.sign_in_content').removeClass('active');
        }
        if ($('.sign_up').hasClass('active_log')) {
            $('.sign_up_content').addClass('active');
        } else {
            $('.sign_up_content').removeClass('active');
        }
    });
    $('.market').hide();
    $('.region').hide();
    $('.city').hide();
    $('.select_specialization').hide();
    $('.product_info_all .select_specialization').show();
    $('.collectionAll .select_specialization').show();
    $('.checked-user input').on('click', function () {
        $('.checked-user input').removeAttr('checked');
        $(this).attr('checked', 'checked');
        if ($('#seller').attr('checked')) {
            $('.market').show();
            $('.region').show();
            $('.city').show();
            $('.select_specialization.toggle_class').hide();
        } else if ($('#manufacturer').attr('checked')) {
            $('.market').show();
            $('.region').show();
            $('.city').show();
            $('.select_specialization.toggle_class').hide();
        } else if ($('#service').attr('checked')) {
            $('.market').show();
            $('.region').show();
            $('.city').show();
            $('.select_specialization.toggle_class').show();
        } else if ($('#regCheck').attr('checked')) {
            $('.market').hide();
            $('.region').hide();
            $('.city').hide();
            $('.select_specialization.toggle_class').hide();
        } else {
            $('.market').hide();
            $('.region').hide();
            $('.city').hide();
            $('.select_specialization.toggle_class').hide();
        }
    })
    $('.select_specialization.toggle_class').on('click', function () {
        $(this).next('.specialization').toggle();
        $(this).children('.icon_rotate').toggleClass('icon_rotate_class');
    });
    function clearField(){
        span = '';
        $('#group-area textarea').val('');
        $( "#target-group input[type=checkbox]" ).prop( "checked", false );
        target_span.html(sercive_titel);
        target_span.removeClass('selected-style');
        $('.radiobtns_row label:first-child input[type=radio]').prop( "checked", true )
        $('#group-select').css('display', 'none')
        $('#group-area').css('display', 'none')
    }
    $('.color-content').on('click',function () {
        $(this).closest('div').find('.field').change()
    })
    $(window).on('click', function (e){
        if ('registerModal' === e.target.id){
            clearField();
        }
    })
    $('#registerModal .close').on('click', function (){
        clearField();
    })

})

    function getAllFilters(fieldName){
        filters[fieldName] = [];
        $.each($(`.field[name="${fieldName}"]:checked`), function(i){
            filters[fieldName].push($(this).val());
        });
    }

    function checkLength(key) {
        if ($('input[name='+key+']:checked').length) {
            getAllFilters(key)} else {filters[key] = []}
    }

    function goTo(page, title, url) {
        if ("undefined" !== typeof history.pushState) {
            history.pushState({page: page}, title, url);
        } else {
            window.location.assign(url);
        }
    }



    let filters = {};
    $('.filter__item input').on('change', function() {

        $(".product_item").slice(0, 12).hide();

        let chartUrl = $('#get-filter').val();
        if (($(location).attr('pathname').indexOf("services") === -1)){
            $('.shop_section_banner .loader').css('display', 'block');
            // PRICE
            let min = $('input[name=min-price]').val(), max = $('input[name=max-price]').val();
            if (min !== "" || max !== "") {
                filters['price'] = {};
                filters['price'] = '[' + min + ',' + max + ']';
                // filters['price']['max'] = max;
            }

            //  FOR metal
            checkLength('metal_id');
            //  FOR WHOM
            checkLength('m_w_c');
            //  FOR type
            checkLength('product_type_id');
            //  FOR fineness
            checkLength('rate_id');
            // COLOR
            checkLength('color');
            //stone carat
            // checkLength('carat');
            //stone cut
            checkLength('cut');
            // used
            checkLength('used');
            // ORIGIN
            checkLength('loc_glob');

            // region
            checkLength('market');

            // gear
            checkLength('product_type_id');

            // belt
            checkLength('belt_type');
            //orderalpha

            checkLength('alpha')


            checkLength('price-up')


            checkLength('price-down')


            checkLength('new')


            checkLength('viewd')


            checkLength('weight-up')


            checkLength('weight-down')

            // weight
            let weight = $('input[name=weight]').val();
            if (weight) filters['weight'] = weight;

            let min_weight = $('input[name=min_weight]').val(), max_weight = $('input[name=max_weight]').val();
            if (min_weight !== undefined && max_weight !== undefined && (min_weight !== "" || max_weight !== "")) {
                filters['weight'] = {};
                filters['weight'] = '[' + min_weight + ',' + max_weight + ']';
                // filters['weight']['max'] = max_weight;
            }

            let search_inUrl = window.location.search.substring(1);
            if (search_inUrl.indexOf("search") > -1) {
                filters['search'] = '';
                let url = new URL(window.location.href);
                filters['search'] = url.searchParams.get("search");
            }





            if ($(location).attr('pathname').indexOf("watch") > -1) {
                chartUrl = $('#watch-filter').val();
            }

        }else{ /*services*/
            $('.serv_section_banner .loader').css('display', 'block');
            /*types*/
            getAllFilters('service_id');

            /*market*/
            getAllFilters('market');
            chartUrl = $('#services-filter').val();
        }

        let jsf = JSON.stringify(filters);
        console.log(jsf);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        console.log(chartUrl);
        $.ajax({
            type: 'POST',
            url: chartUrl,
            data: { filters: jsf },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // dataType: 'JSON',
            success: data => {
                console.log(data);
                $('.shop_section_banner .loader').css('display', 'none');
                $('.serv_section_banner .loader').css('display', 'none');
                $('.shop_section > .catalog__wrap').html(data);
                $('.serv_section > .catalog__wrap').html(data);
                $(".product_item").slice(0, 12).show();
                let par = window.location.origin + window.location.pathname + '?'+$(".catalog__wrap_main").attr('data-par');
                console.log(par);
                goTo("another page", "ttttttt", par);
            },
            error: function (data) {
                console.log(data)
            }
        });
    })

    const getUrlParameter = function getUrlParameter() {
        let sPageURL = window.location.search.substring(1);
        sPageURL = sPageURL.replaceAll(/%22/g,'');
        console.log(sPageURL);
        if (!sPageURL) return false;
        let sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        let arr_par = [];

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            arr_par[i] = [];
            arr_par[i] = sParameterName;
        }
        return arr_par;
    };

    const products = getUrlParameter();
    if (products) {

        products.forEach( function (item) {
            let myItem = item[1].replace('[','').replace(']','');
            myItem = myItem.split(",");

            let prev = 1;
            myItem.forEach(  (inItem) => {

                if(item[0] === 'price' || item[0] === 'weight'){
                    if (prev){
                        $(`[name=min_${item[0]}]`).val(inItem);
                        prev = 0;
                    }else {
                        $(`[name=max_${item[0]}]`).val(inItem);
                        prev = 1;
                    }

                }else{
                    $(`[name=${item[0]}][value=${inItem}]`).prop('checked', true);
                }
            });
        });


    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let chartUrl = $('#get-fav-url').val();
    $('.wishlist_close_btn').click(function () {
        let self = $(this);
        self.parent(".product_item").addClass("deleted");
        let prodId = self.attr('data-prodId');

        $.ajax({
            url : chartUrl,
            data : { prodId },
            type : 'POST',
            success : function( data ){
                console.log(data.success)
            },
            error: function (data) {
                console.log(data)
            }
        });
    });

    $('.fav-action').on('click', function (e){

        let self = $(this);
        let favNotLogin = self.attr('data-target');
        if ('#loginModal' === favNotLogin){
            e.preventDefault();
            return 0;
        }
        let fav_prodId = self.attr('data-prodId');

        $.ajax({
            url : chartUrl,
            data : { fav_prodId },
            type : 'POST',
            success : function( data ){
                console.log(data);
                if (data.success) {
                    self.attr('src', homeUrl + '/images/fav_selected.png');
                } else {
                    self.attr('src', homeUrl + '/images/fav.png');
                }
                console.log(data.success)
            },
            error: function (data) {
                console.log(data)
            }
        });
    });
    function getChart(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let chartUrl = $('#get-chart-url').val();

        $.ajax({
            type: 'POST',
            url: chartUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                $('#main-chart-coming table#local-table tbody').html(data);
            },
            error: function (data) {
                console.log(data)
            }
        });
    }



    function getChartGlobal(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let chartUrl = $('#get-chart-global-url').val();

        $.ajax({
            type: 'POST',
            url: chartUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                $('#main-chart-coming table#global-table tbody').html(data);
            },
            error: function (data) {
                console.log(data)
            }
        });
    }

    let chart_inUrl = window.location.search.substring(1);
    if (chart_inUrl.indexOf("chart") > -1 || chart_inUrl.indexOf("") > -1) {
        getChart();
        setInterval(getChart, 3000);

        getChartGlobal();
        setInterval(getChartGlobal, 3000);
    }
    if ($(location).attr('pathname').indexOf("chart") > -1) {
         $('.last-level').css('display','block');
    }

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "bottomnav") {
        x.className += " responsive";
    } else {
        x.className = "bottomnav";
    }
}
