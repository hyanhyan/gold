{{--@extends('layouts.app')--}}
<style>

    .login_pop {

        display: none;

        position: absolute;

        right: 5%;

    }

    .user:hover .login_pop{

        display: block;

    }
</style>
<header>

    <div class="topnav ">

        <div class="navWidth">

            <div class="dFlex">

                <div class="dropdown">
                    <?php
                    $langImg = 'language';
                    $curLang = 'ՀԱՅ';
                    $myLang = Config::get('app.locale');
                    if ($myLang === 'en'):
                        $langImg = 'us';
                        $curLang = 'ENG';
                    elseif($myLang === 'ru'):
                        $langImg = 'ru';
                        $curLang = 'РУ';
                    endif;
                    ?>

                    <button class="dropbtn"><?php echo $curLang ?>

                        <img src="{{asset('images/select.png')}}" alt="">

                    </button>

                    <div class="dropdown-content animate" style="min-width:80px;">

                        <a href="{{route('lang', 'en')}}">ENG</a>

                        <a href="{{route('lang', 'am')}}">AM</a>

                        <a href="{{route('lang', 'ru')}}">RU</a>

                    </div>

                </div>

                <div class="dropdown">
                    <?php
                    $langImg = 'language';
                    $curLang = 'ՀԱՅ';
                    $myLang = Config::get('app.locale');
                    if ($myLang === 'en'):
                        $langImg = 'us';
                        $curLang = 'ENG';
                    elseif($myLang === 'ru'):
                        $langImg = 'ru';
                        $curLang = 'РУ';
                    endif;
                    ?>
                    <button class="dropbtn">AMD

                        <img src="{{asset('images/select.png')}}" alt="logo">

                    </button>

                    <div class="dropdown-content animate" style="min-width:80px;">

                        <a>AMD</a>

                        <a>USD</a>

                        <a>RUP</a>

                    </div>

                </div>

            </div>

            <div class="logo">

                <a href="{{route('home')}}">

                    <img src="{{asset('images/logo.png')}}" alt="">

                </a>

            </div>

            <div class="icon">
                @php
                    $role_id = 0;
                    $in_menu = 0;
                        if (isset(auth()->user()->roles)){
                            $role_id = auth()->user()->roles->first()->id;
                        }
                    $i_class = 'sign-in-alt';
                    $user_url = '';
                    if (Auth::check()){
                        if ($role_id === 4){

                            $user_url = route('logout');
                            $i_class = 'sign-out-alt';
                        }else{
                            $in_menu = 1;
                            $user_url = route('admin.dashboard');
                            $i_class = 'user';
                        }
                    }

                @endphp
                @if(Auth::user())
                    <div class="user">
                        <a href="{{route('admin.dashboard')}}" ><img src="{{asset('images/user.png')}}" alt=""></a>

                        {{--                    <li class="user_login_icon @guest user_login_ @endguest"><a class="is-{{$i_class}}" href="{{$user_url}}"><i class="fa fa-2x fa-{{$i_class}} " aria-hidden="true"></i></a></li>--}}
                    </div>
                @else
                    <div class="user">
                        <a href="#" ><img src="{{asset('images/user.png')}}" alt=""></a>
                        <div class="login_pop">

                            <div class="login_bg">

                                <a href="#" class="modal-login-toggle">

                                    Sign in

                                </a>

                                <p>New customer? <a href="#">Start here</a></p>

                            </div>

                        </div>

                        {{--                    <li class="user_login_icon @guest user_login_ @endguest"><a class="is-{{$i_class}}" href="{{$user_url}}"><i class="fa fa-2x fa-{{$i_class}} " aria-hidden="true"></i></a></li>--}}
                    </div>

                @endauth
                <div class="wrapper">
                <a  href="{{route('favorite')}}" @if (!Auth::check()) class="modal-toggle"  data-toggle="modal" data-target="#loginModal" @endif><img src="{{asset('images/fav.png')}}" alt=""></a>
                </div>
                <div>
                <a href="#" ><img src="{{asset('images/cart.png')}}" alt=""></a>
                </div>
            </div>

        </div>

    </div>

{{--        <div class="navWidth">--}}

{{--            <div class="dFlex">--}}
{{--                <?php--}}
{{--                $langImg = 'language';--}}
{{--                $curLang = 'ՀԱՅ';--}}
{{--                $myLang = Config::get('app.locale');--}}
{{--                if ($myLang === 'en'):--}}
{{--                    $langImg = 'us';--}}
{{--                    $curLang = 'ENG';--}}
{{--                elseif($myLang === 'ru'):--}}
{{--                    $langImg = 'ru';--}}
{{--                    $curLang = 'РУ';--}}
{{--                endif;--}}
{{--                ?>--}}
{{--                <button class="dropbtn">ENG--}}

{{--                    <img src="{{asset('ages/select.png" alt="">--}}

{{--                </button>--}}

{{--                <div class="dropdown-content animate" style="min-width:80px;">--}}

{{--                    <a href="{{route('lang', 'en')}}">ENG</a>--}}

{{--                    <a href="{{route('lang', 'am')}}">AM</a>--}}

{{--                    <a href="{{route('lang', 'ru')}}">RU</a>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="dropdown">--}}

{{--                <button class="dropbtn">AMD--}}

{{--                    <img src="{{asset('ages/select.png" alt="logo">--}}

{{--                </button>--}}

{{--                <div class="dropdown-content animate" style="min-width:80px;">--}}

{{--                    <a href="{{route('lang', 'am')}}">AMD</a>--}}

{{--                    <a href="{{route('lang', 'en')}}">USD</a>--}}

{{--                    <a href="{{route('lang', 'ru')}}">RUP</a>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="logo">--}}

{{--            <a href="{{route('home')}}">--}}

{{--                <img src="{{asset('images/logo.png')}}" alt="">--}}

{{--            </a>--}}

{{--        </div>--}}



{{--    </div>--}}

    <div class="centernav">

        <div class="navWidth">

                        @include('layouts.include.left_chart')

            <div class="search-guaranteed">

                <div>

                    <form action="{{route('shop', 'search')}}">

                        <label>

                            <input type="search" class="search_input" placeholder="Search" name="search">

                        </label>

                        <!--                        <input type="submit">-->

                    </form>

                </div>

                <a href="#" class="guaranteed-inner">

                    <div class="guaranteed">

                        <p>

                            Guaranteed checking

                        </p>

                        <img src="{{asset('images/guaranteed_checking.png')}}" alt="">

                    </div>

                </a>

            </div>

        </div>
    </div>

    <div class="bottomnav" id="myTopnav">

        <div class="navWidth">

            <div class="dropdown">

                <button class="dropbtn">{{ Lang::get('lang.GOLD_JEWELRY')}}

                <!--                <i class="fa fa-caret-down"></i>-->

                </button>

                <div class="dropdown-content mega-menu animate women">

                    <div class="mega-menu-p">

                        <ul class="women def">
                            <li class="title def">{{ Lang::get('lang.WOMEN')  }}</li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=2&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.WEDDING_RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=3&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=5&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.SETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=6&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.EARRINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=1&m_w_c=1')}}">{{ Lang::get('lang.OTHER')  }}</a></li>
                        </ul>

                        <ul class="man">

                            <li class="title def">{{ Lang::get('lang.MEN')  }}</li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=2&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.WEDDING_RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=5&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=1&m_w_c=2')}}">{{ Lang::get('lang.OTHER')  }}</a></li>
                        </ul>

                        <ul class="children">

                            <li class="title def">{{ Lang::get('lang.CHILDREN')  }}</li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=3&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=6&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.EARRINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.OTHER')  }}</a></li>


                        </ul>

                    </div>

                </div>

            </div>

            <div class="dropdown">

                <button class="dropbtn">{{ Lang::get('lang.SILVER_JEWELRY')}}

                </button>

                <div class="dropdown-content mega-menu animate silver women">

                    <div class="mega-menu-p">

                        <ul class="women">

                            <li class="title">{{ Lang::get('lang.WOMEN')  }}</li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=3&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=5&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.SETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=6&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.EARRINGS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                            <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=2&m_w_c=1')}}">{{ Lang::get('lang.OTHER')  }}</a></li>
                        </ul>

                        <ul class="man">

                            <li class="title">{{ Lang::get('lang.MEN')  }}</li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=5&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=2&m_w_c=2')}}">{{ Lang::get('lang.OTHER')  }}</a></li>
                        </ul>

                        <ul class="children">

                            <li class="title">{{ Lang::get('lang.CHILDREN')  }}</li>

                                <li class="animate"><a href="{{route('shop', 'product_type_id=1&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.RINGS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=3&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.NECKLACES')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=4&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CROSSES')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=6&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.EARRINGS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=7&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.PENDANTS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=8&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.BRACELETS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=9&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CHOKER')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=10&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.CHARMS')  }}</a></li>
                                <li class="animate"><a href="{{route('shop', 'product_type_id=13&metal_id=2&m_w_c=3')}}">{{ Lang::get('lang.OTHER')  }}</a></li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="dropdown">

                <button class="dropbtn"><a href="{{route('shop-watch')}}" style="
                border: none;
                outline: none;
                padding: 10px 7px;
                background-color: inherit;
                transition: 0.5s;
                font-family: 'Montserrat', sans-serif;
                font-style: normal;
                font-weight: 500;
                font-size: 30px;
                line-height: 37px;
                margin-top:-7%;
                color: #000000;
                text-shadow: 0 4px 4px rgb(0 0 0 / 30%);
                cursor: pointer;">
                        {{ Lang::get('lang.WATCHES')}}</a>

                </button>

                <div class="dropdown-content mega-menu animate watches women">

                    <div class="mega-menu-p">

                        <ul class="women">

                            <li class="title">{{ Lang::get('lang.WOMEN')  }}</li>

                        </ul>

                        <ul class="man">

                            <li class="title">{{ Lang::get('lang.MEN')  }}</li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="dropdown">
                <button class="dropbtn">
                    Souvenir
                </button>


                <div class="dropdown-content mega-menu animate souvenir">

                    <div class="mega-menu-p">

                        <ul>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=13')}}">Coins</a></li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=13')}}">Gold bars</a></li>

                            <li class="animate"><a href="{{route('shop', 'product_type_id=13')}}">Antiques</a></li>

                            <!--                        <li class="animate"><a href="">Kitchen & Accessories</a></li>-->

                        </ul>

                    </div>

                </div>

            </div>

            <div class="dropdown">

                <button class="dropbtn">{{ Lang::get('lang.SERVICES')}}

                </button>

                <div class="dropdown-content mega-menu animate services">

                    <div class="mega-menu-p">
                        @if($in_menu)
                            <ul class="">
                                <li class="animate"><a href="{{route('services', 'service_id=1')}}">{{ Lang::get('lang.renovation')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=7')}}">{{ Lang::get('lang.resize')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=3')}}">{{ Lang::get('lang.polishing')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=4')}}">{{ Lang::get('lang.golden_water')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=12')}}">{{ Lang::get('lang.rhodium')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=6')}}">{{ Lang::get('lang.casting')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=2')}}">{{ Lang::get('lang.clockworker')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=8')}}">{{ Lang::get('lang.laser_inspection')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=9')}}">{{ Lang::get('lang.calibration')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=10')}}">{{ Lang::get('lang.chemical_determination')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=11')}}">{{ Lang::get('lang.3d_modeling')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=5')}}">{{ Lang::get('lang.laser_engraving')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=13')}}">{{ Lang::get('lang.candle_making')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=14')}}">{{ Lang::get('lang.stone_placement')  }}</a></li>
                            </ul>
                        @else
                        <ul>
                                <li class="animate"><a href="{{route('services', 'service_id=1')}}">{{ Lang::get('lang.renovation')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=7')}}">{{ Lang::get('lang.resize')  }} </a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=3')}}">{{ Lang::get('lang.polishing')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=4')}}">{{ Lang::get('lang.golden_water')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=12')}}">{{ Lang::get('lang.rhodium')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=2')}}">{{ Lang::get('lang.clockworker')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=8')}}">{{ Lang::get('lang.laser_inspection')  }} </a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=9')}}">{{ Lang::get('lang.calibration')  }}</a></li>
                                <li class="animate"><a href="{{route('services', 'service_id=5')}}">{{ Lang::get('lang.laser_engraving')  }} </a></li>
                        </ul>
                        @endif

                        {{--                        <ul>--}}

                        {{--                            <!--                        <li class="title">Repair</li>-->--}}

                        {{--                            <li class="animate"><a href="">Repair</a></li>--}}

                        {{--                            <li class="animate"><a href="{{route('services', 'service_id=2')}}">{{ Lang::get('lang.clockworker')  }}</a></li>--}}

                        {{--                            <li class="animate"><a href="{{route('services', 'service_id=3')}}">{{ Lang::get('lang.polishing')  }}</a></li>--}}

                        {{--                            <li class="animate"><a href="">Golden Water</a></li>--}}

                        {{--                            <li class="animate"><a href="">Laser engraving</a></li>--}}

                        {{--                            <li class="animate"><a href="">Casting</a></li>--}}

                        {{--                            <li class="animate"><a href="">Resize</a></li>--}}

                        {{--                            <li class="animate"><a href="">Laser inspection</a></li>--}}

                        {{--                            <!--                        <li class="animate"><a href="">Calibration</a></li>-->--}}

                        {{--                            <!--                        <li class="animate"><a href="">Rhodium</a></li>-->--}}

                        {{--                        </ul>--}}

                        {{--                        <ul>--}}

                        {{--                            <li class="animate"><a href="">Calibration</a></li>--}}

                        {{--                            <li class="animate"><a href="">Rhodium</a></li>--}}

                        {{--                        </ul>--}}

                    </div>

                </div>

            </div>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

        </div>



    </div>



</header>

@if (!Auth::check())
<div class="modal-login login">

    <div class="modal-overlay modal-login-toggle"></div>

    <div class="modal-wrapper modal-transition">

        <div class="modal-body">

            <div class="modal-content">

                <img src="{{asset('images/logo.png')}}" alt="logo">

                <div class="dFlex justify-between log_reg_toggle">
                    @if($user_url)
                        @if($role_id ===4)
                            <a class="is-{{$i_class}}" href="{{$user_url}}">Log Out</a>
                        @else
                            <a class="is-{{$i_class}}" href="{{$user_url}}">Dashboard</a>
                        @endif
                    @else
                    @if (isset($services) && !!$services)
                    <p class="sign_up">

                        {{ Lang::get('lang.REG') }}
                    </p>
                    @endif

                    <p class="sign_in active_log">

                        Sign in

                    </p>
                @endif
                </div>

                <div class="sign-up-in">

                    <p>with your social network</p>

                    <div class="reg_icon dFlex justify-center align-center">

                        <a href="#">

                            <img src="{{asset('images/icon_google.png')}}" alt="">

                        </a>

                        <span> or </span>

                        <a href="#">

                            <img src="{{asset('images/icon_fb.png')}}" alt="">

                        </a>

                    </div>

                </div>

                <div class="sign_up_content">

                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-item">

                            <div class="name">

                                <label for="name">{{ Lang::get('lang.YOUR_NAME')}}</label>

                                <input type="text" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="surname">

                                <label for="surname"></label>

                                <input type="text" id="surname" name="surname" placeholder="Surname">

                            </div>

                            <div class="companyName">

                                <label for="companyName"></label>

                                <input type="text" id="companyName" name="companyName" placeholder="Company name">

                            </div>

                            <div class="country">

                                <label for="country"></label>

                                <select name="country" id="country" >

                                    <option value="" disabled >country</option>

                                    <option value="" >country 1</option>

                                    <option value="" >country 2</option>

                                </select>

                            </div>

                            <div class="region">

                                <label for="region"></label>

                                <select name="region" id="region" >

                                    <option value="" disabled >Region</option>

                                    <option value="" >Region 1</option>

                                    <option value="" >Region 2</option>

                                </select>

                            </div>

                            <div class="city">

                                <label for="city"></label>

                                <select name="city" id="city" >

                                    <option value="" disabled >City</option>

                                    <option value="" >City 1</option>

                                    <option value="" >City 2</option>

                                </select>

                            </div>

                            <div class="market">

                                <label for="market"></label>

                                <input type="text" id="market" name="market" placeholder="Market">

                            </div>

                            <div class="phone">

                                <label for="phone"></label>

                                <input type="number" id="phone" name="phone" placeholder="Phone Number">

                            </div>

                            <div class="email-inp">

                                <label for="regEmail">{{ Lang::get('lang.EMAIL')}}</label>

                                <input type="email" class="@error('email') is-invalid @enderror" id="regEmail" name="email" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pass-inp">

                                <label for="regPass">{{ Lang::get('lang.USER_PASS')}}</label>

                                <input type="password" class="@error('password') is-invalid @enderror" id="regPass" name="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pass-inp">

                                <label for="confPass">{{ Lang::get('lang.CONFIRM_PASS') }}</label>

                                <input type="password" id="confPass" name="password_confirmation" placeholder="Confirm Password">

                            </div>

                            <div class="choose_specialization">

                                <div class="select_specialization toggle_class">

                                    <img src="{{asset('images/police.png')}}" alt="police">

                                    <span>Choose a specialization</span>

                                    <img class="icon_rotate" src="{{asset('images/choose.png')}}" alt="choose">

                                </div>

                                <div class="specialization">
                                    @if (isset($services) && !!$services)
                                        @foreach($services as $key=> $service)
                                            <label  for="repair" class="check container_inp">
                                                <input name="services[]" type="checkbox" value="{{$key}}" data-value="{{Lang::get('lang.' . $service)}}" id="repair">
                                                {{Lang::get('lang.' . $service)}}
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>



                            </div>

                        </div>



                        <div class="dFlex checked-user">

                            <label  for="regCheck" class="check container_inp">

                                <input type="radio"  value="4" name="UserRole" id="regCheck">

                                Buyer

                                <span class="checkmark"></span>

                            </label>

                            <label for="seller" class="check container_inp">

                                <input type="radio" value="2" name="UserRole" id="seller">

                                Seller

                                <span class="checkmark"></span>

                            </label>

                            <label for="manufacturer" class="check container_inp">

                                <input type="radio" value="3" name="UserRole" id="manufacturer">

                                Manufacturer

                                <span class="checkmark"></span>

                            </label>

                            <label for="service" class="check container_inp">

                                <input  type="radio"  id="service" name="UserRole" value="5">

                                Service

                                <span class="checkmark"></span>

                            </label>

                        </div>

                        <div class="form-item" style="justify-content: center;display:flex;">

                            <label for="privacy_policy" class="check container_inp">

                                <input  type="checkbox" name="privacy" id="privacy_policy">

                                I agree with the <a href="#">privacy policy</a>

                                <span class="checkmark"></span>

                            </label>

                        </div>

                        <button type="submit"> {{ Lang::get('lang.REG')}}</button>

                    </form>

                </div>

                <div class="sign_in_content active ">



                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="email-inp">

                            <label for="Email"></label>

                            <input type="email" class="@error('email') is-invalid @enderror" id="Email" name="email" placeholder="Email">

                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                        <div class="pass-inp">

                            <label for="pass"></label>

                            <input type="password" id="pass" class="@error('password') is-invalid @enderror" name="password" placeholder="Password">

                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror

                        <p>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">

                                {{ __('Forgot Your Password?') }}

                            </a>
                            @endif
                        </p>

                        <div class="check">

                            <input type="checkbox" id="check" name="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="check">{{ Lang::get('lang.REMEMBER_ME') }}</label>

                        </div>


                        <button type="submit">{{ Lang::get('lang.LOGIN') }}</button>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
@endif
<div class="modal mySellection"  >

    <div class="modal-overlay modal-toggle"></div>

    <div class="modal-wrapper modal-transition">

        <!--        <div class="modal-header">-->

        <!--            <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>-->

        <!--            <h2 class="modal-heading">This is a modal</h2>-->

        <!--        </div>-->



        <div class="modal-body">

            <div class="modal-content">

                <img src="{{asset('images/logo.png')}}" alt="logo">

                <p>

                    If you are a member, you can log in to access the products you

                    like when you come back

                    to the site, or you can become a member if you are not.

                </p>
                <a class="modal-login-toggle" href="my-sellection.html" >Sign in</a>

            </div>

        </div>

    </div>

</div>
