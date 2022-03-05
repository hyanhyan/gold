@extends('layouts.app')

@section('content')


    <section>

        <div class="banner-inner">

            <div class="container-inner">

                <div class="video-inner">

                    <img src="{{asset('images/videoImg.png')}}" alt="banner">

                    <div class="play">

                        <img src="{{asset('images/play.png')}}" alt="video play">

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="collection-inner">

            <div class="container-inner">

                <div class="container">

                    <div class="collection">

                        <div class="title">

                            <div class="dFlex align-center">

                                <div>

                                    <h2>{{ Lang::get('lang.COLLECTION')}}</h2>

                                </div>

                                <div>

                                    <img class="w100 hAuto" src="{{asset('images/line.png')}}" alt="line">

                                </div>

                            </div>

                        </div>

                        <div class="home_content_tabs">

                            <span class="before_title">{{ Lang::get('lang.COLLECTION')}}</span>

                            <button type="button" class="btn btn-lg btn-toggle " >

                                <div class="handle"></div>

                            </button>

                            <span class="after_title">{{ Lang::get('lang.SHOPPING_CENTERS')  }}</span>

                        </div>

                        <div class="collection_content collection_hover">
                            <div class="multiple-items">
                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionRings.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.RINGS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionCrosses.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.CROSSES')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionWeddingRings.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>Wedding rings</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionRings.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.RINGS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="multiple-items">

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionBracelets.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.BRACELETS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionPendants.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.PENDANTS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionEarrings.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="collection.html">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.EARRINGS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/collectionRings.png')}}" alt="collection">
                                                <div class="collection_hover_item">
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=1')}}">
                                                        Gold
                                                    </a>
                                                    <a href="{{route('shop', 'product_type_id=6&metal_id=2')}}">
                                                        Silver
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.RINGS')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="collection_content_all">

                                <a href="#">

                                    View All

                                </a>

                            </div>

                        </div>

                        <div  class="shopping_center_content">

                            <div class="multiple-items">

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/yerevan.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.YEREVAN')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/aragacotn.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.ARAGATSOTN')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/ararat.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.ARARAT')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/yerevan.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.YEREVAN')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="multiple-items">

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/armavir.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.ARMAVIR')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/gexarkunik.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.GEGHARKUNIK')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/kotayq.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.KOTAYK')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{asset('images/yerevan.png')}}" alt="shopping center">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{ Lang::get('lang.YEREVAN')  }}</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="collection_content_all">

                                <a href="#">

                                    View All

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="collection-inner">

            <div class="container-inner">

                <div class="container">

                    <div class="collection">

                        <div class="title">

                            <div class="dFlex align-center justify-between">

                                <div>

                                    <img class="w100 hAuto" src="{{asset('images/newAddedLine.png')}}" alt="line">

                                </div>

                                <div>

                                    <h2>New Added</h2>

                                </div>

                            </div>

                        </div>

                        <div class="newAdded-inner ">

                            <div class="newAdded">
                                @foreach($product as $prod)
                                    <div>

                                        <div class="slider-item">

                                            <div>

                                                <div class="slider-item-img">
                                                    @if(isset($prod['pictures']['img_name']))

                                                        <img src="{{ asset(  '/uploads/products/' . $prod['pictures']['img_name'] )}}" alt="collection">
                                                    @else
                                                        <img src="{{ asset(  '/uploads/products/' . $prod['pictures'] )}}" alt="collection">
                                                    @endif
                                                </div>

                                                <div class="slider-item-title">

                                                    <span> {{$prod->title}} {{$prod->price}}</span>$

                                                    <p>Aldoro</p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <div class="collection_content_all">

                                <a href="{{route('added')}}">

                                    View All

                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="collection-inner">

            <div class="container-inner">

                <div class="container">

                    <div class="collection">

                        <div class="title">

                            <div class="dFlex align-center justify-between">

                                <div>

                                    <img class="w100 hAuto" src="{{asset('images/newAddedLine.png')}}" alt="line">

                                </div>
                                <div>

                                    <h2>Most viewed</h2>

                                </div>

                            </div>

                        </div>

                        <div class="newAdded-inner ">

                            <div class="newAdded">
                                @foreach($click_count as $click)
                                    <div>

                                        <div class="slider-item">

                                            <div>

                                                <div class="slider-item-img">
                                                    <img src="{{ asset(  '/uploads/products/' . $click->pictures[0]['img_name'] )}}">
                                                </div>

                                                <div class="slider-item-title">

                                                    <span> {{$click->title}} {{$click->price}}</span>$

                                                    <p>Aldoro</p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <div class="collection_content_all">

                                <a href="{{route('viewd')}}">

                                    View All

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>






















    {{--    <script src="{{ asset('/js/chart-min.js') }}"></script>--}}
@endsection

