@extends('layouts.app')

@section('content')
            <section>

                <div class="collection-inner">

                    <div class="container-inner">

                        <div class="container">

                            <div class="collection  fake_section_banner">

                                <div class="newAdded-innerfake_section fav_product">

                                    <div class="newAdded_sellection fav_products" data-count="{{ count($fav_prods )}}">
                                        @foreach($fav_prods as $favorite)

                                            <div class="slider-item product_item">

                                                <div>

                                                    <div class="slider-item-img">

                                                        <img src="{{ asset('/uploads/products/' . $favorite->pictures )}}" alt="collection">

                                                    </div>
                                                    <a href="{{route('shop.product', $favorite->id)}}">
                                                    <div class="slider-item-title">

                                                      <span>{{$favorite->title }}</span>

                                                        <p>Aldoro</p>
                                                    </div>
                                                    </a>

                                                </div>

                                            </div>

                                            @endforeach

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>
            @if(count($fav_prods) > 12)
                <div class="load_more_btn">
                    <a href="#" id="loadMore">Տեսնել ավելին</a>
                </div>
            @endif
@endsection
