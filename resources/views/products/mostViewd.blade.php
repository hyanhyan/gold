@extends('layouts.app')

@section('content')
    <section>
        <div class="collection-inner">
            <div class="container-inner">
                <div class="container">
                    <div class="collection">
                        <div class="newAdded-inner ">
                            <div class="newAdded_sellection">
                                @foreach($click_count as $click)
                                    <div>
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="{{ asset(  '/uploads/products/' . $prod->pictures[0]['img_name'] )}}" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <span>{{$prod->title}} {{$product->price}}</span>$
                                                    <p>{{$info->title}}</p>
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
