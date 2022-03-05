            <div class="newAdded_sellection catalog__wrap_main" data-par="{{$query}}">
                            @foreach($users as $user)
                            <div>

                                <a href="{{route('service.item', $user->user_id)}}">

                                    <div class="slider-item">

                                        <div>

                                            <div class="slider-item-img">

                                                <img src="{{ asset(  '/uploads/profiles/' . $user->pictures )}}" alt="collection">

                                            </div>

                                            <div class="slider-item-title">

                                                <p>{{$user->title}}</p>

                                            </div>

                                        </div>

                                    </div>

                                </a>

                            </div>
                            @endforeach


                        </div>






{{--<div class="catalog__wrap_main" data-par="{{$query}}">--}}
{{--    @foreach($users as $user)--}}
{{--        <div class="product_item serv_item">--}}
{{--            <a href="{{route('service.item', $user->user_id)}}">--}}
{{--                <img src="{{ asset(  '/uploads/profiles/' . $user->pictures )}}">--}}
{{--                <div class="serv_main_info">--}}
{{--                    <h3 class="serv_title">{{$user->title}}</h3>--}}
{{--                    <p class="serv_desc">{{  Lang::get('lang.' . $user->market )}} {{ $user->address }}</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}
{{--@if(count($users) > 12)--}}
{{--    <div class="load_more_btn">--}}
{{--        <a href="#" id="loadMore">Տեսնել ավելին</a>--}}
{{--    </div>--}}
{{--@endif--}}
