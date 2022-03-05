<div class="catalog__wrap">
    <div class="newAdded_sellection catalog__wrap_main" data-par="{{$query}}">

    @foreach($products as $product)

            <div class="product_item">

                <div class="slider-item">

                    <div>

                        <div class="slider-item-img">

                            <a href="{{route('shop.product', $product->id)}}">
                                    <img src="{{ asset(  '/uploads/products/' . $product->pictures[0])}}" alt="collection">
                            </a>
                        </div>

                        <div class="slider-item-title">

                            <span>{{$product->title}} {{$product->price}} $</span>

                            <p>{{$product->content}}</p>

                        </div>

                    </div>

                </div>

            </div>
        @endforeach
    </div>
</div>
