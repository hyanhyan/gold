@extends('layouts.app')

@section('content')

    <div class="profile_section_banner">
        <div class="profile_section fake_product">
            <div class="page_left">
                <div class="owl-carousel">
                    @foreach($fake->pictures as $picture)
                        <div class="item">
                            <img src="{{ asset(  '/uploads/products/' . $picture)}}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="page_right fake_product_info">
                <div class="profile_title">{{$fake->title}}</div>
                <p class="prod_description">{{$fake->content}}</p>
            </div>
        </div>
    </div>

@endsection
