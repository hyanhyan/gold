@extends('layouts.app')

@section('content')
    <section>

        <div class="collection-inner">

            <div class="container-inner">

                <div class="container">

                    <div class="collection">

                        <div class="newAdded-inner ">

                            <div class="newAdded_sellection">
                                @foreach($product as $prod)
                                    <div>

                                        <div class="slider-item">

                                            <div>

                                                <div class="slider-item-img">
                                                        <img src="{{ asset(  '/uploads/products/' . $prod['pictures']['img_name']  )}}" alt="collection">
                                                </div>

                                                <div class="slider-item-title">

                                                    <span>{{$prod['title']}} {{$prod['price']}}</span>$
                                                </div>

                                            </div>

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
@endsection
