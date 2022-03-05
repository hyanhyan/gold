@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
    <div class="product_categories_slider">
        <div class="owl-carousel">
            @foreach($collections as $collection)
                <div class="product_categories_list d-flex">
                <div class="item slider_product_category flex-wrap">
                    <div class="product_category">
                        <div class="product_image">
                            <img src="{{ asset('images/ring.png')}}">
                        </div>
                        <div class="category_name">
                            <div class="category_title text-uppercase">{{ Lang::get($collection->name)  }}</div>
                            <div class="category_type">
                                <a class="gold_product text-uppercase" href="{{route('shop', 'product_type_id=1&metal_id=1')}}">{{ Lang::get('lang.GOLD')  }}</a>
                                <a class="silver_product text-uppercase" href="{{route('shop', 'product_type_id=1&metal_id=2')}}">{{ Lang::get('lang.SILVER')  }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="product_categories_list ">
                    @endforeach
        </div>
    </div>
@endsection
