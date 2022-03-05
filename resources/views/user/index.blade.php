@extends('layouts.app')

@section('content')

    <div class="profile_section_banner">
        <div class="profile_section userpage">
            <div class="page_left">
                <div class="circle" style="background-image: url({{ asset('uploads/profiles/' . $info->pictures)}})"></div>
            </div>
            <div class="page_right">
                <div class="profile_title">{{$info->title}}</div>
                <ul>
                    <li><img src="{{ asset('images/location.png')}}">{{  Lang::get('lang.' . $info->market )}} {{ $info->address }}, {{ $info->optional_address }}</li>
                    <li><img src="{{ asset('images/tel.png')}}">{{$info->phone}}</li>
                    <li><img src="{{ asset('images/mes.png')}}">{{$info->email}}</li>
                </ul>
                <p class="prod_description">{{$info->description}}</p>
                <div class="f_social_menu">
                    <ul>
                        @foreach($info->messengers as $messenger)
                            @php
                                $icon = 'viber';
                                $color = '#800080';
                            @endphp
                            @if ($messenger === '1')
                                @php
                                    $icon = 'whatsapp';
                                    $color = '#25D366';
                                @endphp
                            @elseif($messenger === '2')
                                @php
                                    $icon = 'telegram';
                                    $color = '269cd9';
                                @endphp
                            @endif

                            <li>
                                <a href="tel:{{ $info->optional_phone }}" class="fa-2x"><i style="color: {{$color}};" class="fab fa-{{$icon}}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="fav_products_slider">
            <h3 class="slider_title">{{ Lang::get('lang.NEW_ADDITIONS')  }}</h3>
            <div class="owl-carousel">
                @php $calc = 0; @endphp
                @foreach($products as $product)
                    @if(5 < ++$calc) @break; @endif
                    <div class="product_item item fav_product_item">
                    <a href="{{ route('shop.product',$product->id)}}">
                        <div class="wishlist">
                            <img @if (!Auth::check()) data-toggle="modal" data-target="#loginModal" @endif class="fav-action" data-prodId="{{$product->id}}" src="{{  asset(in_array( $product->id, $favorites) ? "images/fav_selected.png" : "images/fav.png" )}}">
                        </div>
                        <div class="product_main_info">
                            <img src="{{ asset(  '/uploads/products/' . $product->pictures[0] )}}">
                            <h3 class="product_title">{{$product->title}}</h3>
                            <p class="product_desc">{{$product->content}} </p>
                            <div class="product_price"><span>{{$product->price}}</span>$</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="fav_products_slider2">
            <h3 class="slider_title">ԱՄԲՈՂՋ ՏԵՍԱԿԱՆԻ</h3>
            <div class="userpage_favs_content">

                @foreach($products as $product)
                    <div class="product_item item fav_product_item">
                        <a href="{{ route('shop.product',$product->id)}}">
                            <div class="wishlist">
                                <img @if (!Auth::check()) data-toggle="modal" data-target="#loginModal" @endif class="fav-action" data-prodId="{{$product->id}}" src="{{  asset(in_array( $product->id, $favorites) ? "images/fav_selected.png" : "images/fav.png" )}}">
                            </div>
                            <div class="product_main_info">
                                <img src="{{ asset(  '/uploads/products/' . $product->pictures[0] )}}">
                                <h3 class="product_title">{{$product->title}}</h3>
                                <p class="product_desc">{{$product->content}} </p>
                                <div class="product_price"><span>{{$product->price}}</span>$</div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
