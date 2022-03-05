@extends('layouts.app')

@section('content')

    <section>
        <div class="collection-inner single_inner">
            <div class="container-inner">
                <div class="container">
                    <div class="single_product">
                        <div class="product_img">
                            <div class="services_img">
                                <img src="{{ asset("/uploads/profiles/$user->pictures")}}" alt="services">
                            </div>
                        </div>
                        <div class="product_description">
                            <div class="product_name">
                                <div class="dFlex">
                                    <h2>{{$user->title}}</h2>
                                </div>
                            </div>
                            <div class="description">
                                <h3>
                                    Biography
                                </h3>
                                <div class="bio">

                                    {{$user->description}}
                                </div>

                            </div>
                            <div class="contact">
                                <h3>Contact</h3>
                                <div class="dFlex justify-center">
                                    <div>
                                        <ul>
                                            <li>
                                                <div>
                                                    @if($user->optional_phone)
                                                        @if(isset($user->messengers[0]) &&  in_array('0', $user->messengers))
                                                    <a href="viber://add?number=044 999 585"><img src="{{asset('images/viber.png')}}" alt="viber"></a>
                                                        @endif
                                                            @if(isset($user->messengers[0]) &&  in_array('1', $user->messengers))
                                                    <a href="whatsapp://add?number=044 999 585"><img src="{{asset('images/whatsapp.png')}}" alt="whatsapp"></a>
                                                        @endif
                                                        @endif
                                                </div>
                                                <div>
                                                    <span> {{  $user->phone }} {{ $user->optional_phone }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <a href="tel:099 659 965 "> <img src="{{asset('images/phone.png')}}" alt="phone"> </a>
                                                </div>
                                                <div>
                                                    <a href="tel:099 659 965 "> {{ $user->optional_phone }}  </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/user_product.png')}}" alt="user">
                                                </div>
                                                <div>
                                                    <span>{{$user->title}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/location.png')}}" alt="location">
                                                </div>
                                                <div>
                                                    <span>{{  Lang::get('lang.' . $user->market )}} {{ $user->address }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/letter.png')}}" alt="location">
                                                </div>
                                                <div>
                                                    <span>{{$user->email}}</span>
                                                </div>

                                            </li>
                                            <li>
                                                <div>
                                                    <a href="#">
                                                        <img src="{{asset('images/fb_ic_contact.png')}}" alt="">
                                                    </a>
                                                    <a href="#">
                                                        <img src="{{asset('images/insta_ic-contact.png')}}" alt="">
                                                    </a>
                                                </div>
                                                <div>

                                                </div>

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="collection-inner single_inner">
            <div class="container-inner">
                <div class="container">
                    <div class="collection">
                        <div class="title">
                            <div class="dFlex align-center">
                                <div>
                                    <h2>Other people</h2>
                                </div>
                                <div>
                                    <img class="w100 hAuto" src="{{asset('images/line.png')}}" alt="line">
                                </div>
                            </div>
                        </div>
                        <div class="newAdded-inner ">
                            <div class="newAdded">
                                @foreach($users as $user)
                                <div>
                                    <div class="slider-item">
                                        <div>
                                            <a href="{{route('service.item', $user->user_id)}}">
                                            <div class="slider-item-img">
                                                <img src="{{ asset(  '/uploads/profiles/' . $user->pictures )}}" alt="collection">
                                            </div>
                                            </a>
                                            <div class="slider-item-title">
                                                <p>{{$user->title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($users) > 12)
                            <div class="collection_content_all">
                                <a href="{{route('services')}}">
                                    View All
                                </a>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection
