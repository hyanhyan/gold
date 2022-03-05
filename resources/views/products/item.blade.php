@extends('layouts.app')

@section('content')
    <section>
        <div class="collection-inner single_inner">
            <div class="container-inner">
                <div class="container">
                    <div class="single_product">
                        <div class="product_img">
                            <div>
                                <img src="{{ asset('/uploads/products/' . $product->pictures[1]['img_name'])}}" alt="">
                            </div>
{{--                            {{dd($product)}}--}}
                            <div class="product_slid_img">
                                @foreach($product->pictures as $picture)
                                <div>
                                    <img src="{{ asset('/uploads/products/' . $picture['img_name'])}}" alt="">
                                </div>
                                @endforeach
                                    @php
                                        $threeD_path = public_path('/uploads/3DImages/' . $product->code . $product->id);
                                        $threeD_assets = asset('/uploads/3DImages/' . $product->code . $product->id);

                                    @endphp
                                    @if(is_dir($threeD_path) && $handle = opendir($threeD_path))
                                        <div class="threed-images">
                                            @while (false !== ($entry = readdir($handle)))
                                                @if ($entry == '.' or $entry == '..') @continue; @endif
                                                <img src="{{$threeD_assets . '/' .$entry}}" alt="{{$entry}}">
                                            @endwhile
                                        </div>
                                        @php closedir($handle); @endphp
                                    @endif
                                    @php
                                        $role_id = 0;
                                        $in_menu = 0;
                                            if (isset(auth()->user()->roles)){
                                                $role_id = auth()->user()->roles->first()->id;
                                            }
                                        $i_class = 'sign-in-alt';
                                        $user_url = '';
                                        if (Auth::check()){
                                            if ($role_id === 4){

                                                $user_url = route('logout');
                                                $i_class = 'sign-out-alt';
                                            }else{
                                                $in_menu = 1;
                                                $user_url = route('admin.dashboard');
                                                $i_class = 'user';
                                            }
                                        }

                                    @endphp
                                    <div class="gallery_bar_item {{ empty($product->videoURL) ? 'empty-video': ''}} " data-toggle="modal" data-target="#myModal">
                                        <img src="{{ asset('images/video-icon.png')}}" alt="image">
                                    </div>
                            </div>


                        </div>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog col-12 mw-100 h-75">
                                <!-- Modal content-->
                                <div class="modal-content h-100">
                                    <iframe id="YTPlayer" style="width: 100%; height: 100%" src="https://youtube.com/embed/{{$product->videoURL}}?app=mobile" frameborder="0"></iframe>

                                </div>

                            </div>
                        </div>
                        <div class="product_description">
                            <div class="product_name">
                                <div class="dFlex">
                                    <h2>{{$info->title}} <span>{{$product->code}}</span> </h2>
                                    <div class="star">
                                        <img src="{{asset('images/star.png')}}" alt="star">
                                        <img src="{{asset('images/star.png')}}" alt="star">
                                        <img src="{{asset('images/star.png')}}" alt="star">
                                        <img src="{{asset('images/star.png')}}" alt="star">
                                        <img src="{{asset('images/star.png')}}" alt="star">
                                        <span>(15)</span>
                                    </div>
                                </div>
                                <div class="dFlex  justify-between product_info">
                                    <div class="product_info_all">
                                        <ul>
                                            <li><span >Price:</span>
                                                <div class="sort_by">
                                                    <div class="choose_specialization">
                                                        <div class="select_specialization toggle_class">
                                                            <span class="price">{{$product->price}}$ </span>
                                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">
                                                        </div>
                                                        <div class="specialization">
                                                            <ul>
                                                                <li>
                                                                    415.000 d
                                                                </li>
                                                                <li>
                                                                    850$
                                                                </li>
                                                                <li>
                                                                    1.500.00 ₽
                                                                </li>
                                                            </ul>

                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li><span>Change:   </span><span class="change changeSize-modal-toggle">Size and Weight</span></li>
                                            <li><span>Ship to:  </span> <span class="change">Armenia <img src="{{asset('images/choose.png')}}" alt="choose"></span></li>
                                            <li><span>Delivery: </span><span>Will be deliver 5 nov</span></li>
                                            <li><span>Shipping:</span> <span>35$ with Fedex</span></li>
                                        </ul>
                                    </div>
                                    <div class="product_btn">
                                        <a href="#" class="buy_product">
                                            Buy
                                        </a>
                                        <button>
                                            Add to cart
                                            <img src="{{asset('images/cart_two.png')}}" alt="cart">
                                        </button>
                                        <button @if (!Auth::check()) class="modal-login-toggle" data-toggle="modal" data-target="#loginModal" @else class="fav-action" data-prodId="{{$product->id}}" @endif>

                                            Add to Watchlist
                                            <img @if (!Auth::check()) class="modal-login-toggle" data-toggle="modal" data-target="#loginModal" @else class="fav-action" data-prodId="{{$product->id}}" @endif src="{{asset('images/heart.png')}}" alt="fav">
                                        </button>
                                        <button class="makeOffer-modal-toggle">
                                            Make offer
                                            <img src="{{asset('images/deal.png')}}" alt="deal">
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="description">
                                <h3>
                                    Description
                                </h3>
                                <div>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Condition</th>
                                            <th>Origin</th>
                                            <th>Material</th>
                                            <th>Fineness</th>
                                            <th>Weight</th>
                                        </tr>
                                        <tr>
                                            <td>{{$product->title}}</td>
                                            <td>@if($product->used === 0) Used @else New @endif</td>
                                            <td>{{ 1 === $product->loc_glob ? Lang::get('lang.PRODUCT_ARMENIAN') : Lang::get('lang.PRODUCT_IMPORTED') }}</td>
                                            <td>{{$product->metal_name}}</td>
                                            <td>{{$product->rate_purity}}</td>
                                            <td>{{$product->weight}}g</td>
                                        </tr>
                                    </table>
                                    @if($stones)
                                    <table>
                                        <tr>
                                            <th>{!! Lang::get('lang.STONE') !!}</th>
                                            <th>{!! Lang::get('lang.CARAT') !!}</th>
                                            <th>Pcs</th>
                                            <th>{!! Lang::get('lang.COLOR') !!}</th>
                                            <th>{!! Lang::get('lang.CLARITY') !!}</th>
                                            <th>{!! Lang::get('lang.CUT') !!}</th>
                                        </tr>
                                        @foreach($stones as $stone)
                                        <tr>
                                            <td>{{$stone['stone_name']}}</td>
                                            <td>{{$stone['carat']}} ct</td>
                                            <td>{{$stone['pcs']}} ct</td>
                                            <td>{{$stone['color']}}</td>
                                            <td>{{$stone['clarity']}}</td>
                                            <td>{{$stone['cut']}}</td>
                                        </tr>
                                            @php
                                                $caratTotal = 0;$caratTotal += $stone['carat'];
                                                $pcsTotal = 0;$pcsTotal += $stone['pcs'];
                                            @endphp
                                            @endforeach
                                    </table>
                                    @endif

                                    <table>
                                        <tr>
                                            <th>Total</th>
                                            <td>@if(isset($caratTotal)){{$caratTotal}}@endif ct</td>
                                            <td>@if(isset($pcsTotal)){{$pcsTotal}}@endif</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <div>
                                        <h5>
                                            Comment
                                        </h5>
                                        <p>Diamond</p>
                                    </div>

                                </div>

                            </div>
                            <div class="contact">
                                <h3>Contact</h3>
                                <div class="dFlex justify-center">
                                    <div>
                                        @if($info->optional_phone)
                                        <ul>
                                            <li>
                                                <div>
                                                    @if(isset($info->messengers[0]) &&  in_array('0', $info->messengers))
                                                    <a href="viber://add?number=044 999 585"><img src="{{asset('images/viber.png')}}" alt="viber"></a>
                                                    @endif
                                                        @if(isset($info->messengers[0]) &&  in_array('1', $info->messengers))
                                                        <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $info->optional_phone }}"><img src="{{asset('images/whatsapp.png')}}" alt="whatsapp"></a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <a href="tel:099 659 965 "> <img src="{{asset('images/phone.png')}}" alt="phone"> </a>
                                                </div>
                                                <div>
                                                    <a href="tel:099 659 965 "> {{$info->optional_phone}}  </a>
                                                </div>

                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/user_product.png')}}" alt="user">
                                                </div>
                                                <div>
                                                    <span>{{$info->title}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/location.png')}}" alt="location">
                                                </div>
                                                <div>
                                                    <span>Pushkin 21</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <img src="{{asset('images/letter.png')}}" alt="location">
                                                </div>
                                                <div>
                                                    <span>{{$info->email}}</span>
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
                                        @endif
                                        <a href="#" class="comp_page">CLICK FOR COMPANY PAGE</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog cursor-default" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{Lang::get('lang.OFFER')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                    <h2>Սրահի այլ տեսականի</h2>
                                </div>
                                <div>
                                    <img class="w100 hAuto" src="{{asset('images/line.png')}}" alt="line">
                                </div>
                            </div>
                        </div>
                        <div class="newAdded-inner ">
                            <div class="newAdded">
                                @foreach($userProducts as $prod)
                                <div>
                                    <div class="slider-item">
                                        <a href="{{ route('shop.product',$prod->id)}}">
                                        <div>
                                            <div class="slider-item-img">
                                                <img src="{{ asset(  '/uploads/products/' . $prod->pictures[0]['img_name'] )}}" alt="collection">
                                            </div>
                                            <div class="slider-item-title">
                                                <span>{{$prod->title}} {{$product->price}}</span>$
                                                <p>{{$info->title}}</p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="collection_content_all">
                               <a href="{{route('addedProducts',$product->id)}}">
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
        <div class="collection-inner single_inner">
            <div class="container-inner">
                <div class="container">
                    <div class="collection">
                        <div class="title">
                            <div class="dFlex align-center justify-between">
                                <div>
                                    <img class="w100 hAuto" src="{{asset('images/mostviewed.png')}}" alt="line">
                                </div>
                                <div>
                                    <h2>Կարող եք հավանել</h2>
                                </div>
                                <div>
                                    <img class="w100 hAuto" src="{{asset('images/mostviewed.png')}}" alt="line">
                                </div>
                            </div>
                        </div>
                        <div class="newAdded-inner mostView">
                            <div class="newAdded">
                                @foreach($prodCat as $prod)
                                <div>
                                    <div class="slider-item">
                                        <a href="{{ route('shop.product',$prod->id)}}">
                                        <div>
                                            <div class="slider-item-img">
                                                <img src="{{ asset(  '/uploads/products/' . $prod->pictures[0]['img_name'] )}}" alt="collection">
                                            </div>

                                            <div class="slider-item-title">
                                                <span>{{$prod->title}} {{$product->price}}</span>$
                                                <p>Aldoro</p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                    @endforeach


    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog cursor-default" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{Lang::get('lang.OFFER')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method' => 'OFFER','route' => ['ajaxRequest.make_offer'],'style'=>'display:inline']) !!}

                    @if(empty($offer))
                        <p>3 offers left</p>
                    @elseif($offer->offer_count == 1)
                        <p>2 offers left</p>
                    @elseif($offer->offer_count == 2)
                        <p>1 offers left</p>
                    @else
                        <p style="color:red">You don't have any chance</p>
                    @endif
                    <input type="text"  name="price" placeholder="price">
                    <input type="hidden" value="{{$product->id}}" name="product">
                    {!! Form::submit( Lang::get('lang.OFFER') , ['class' => 'btn btn-success']) !!}
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>
    <div class="modal mySellection changeSize"  >
        <div class="modal-overlay changeSize-modal-toggle"></div>
        <div class="modal-wrapper modal-transition">

            <div class="modal-body">
                <div class="modal-content">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                    <p>
                        Contact the seller to change the size and weight of this jewelery
                    </p>
                    <div class="dFlex justify-between">
                        <div class="dFlex align-center">
                            <a href="viber://add?number=044 999 585"><img src="{{asset('images/viber.png')}}" alt="viber"></a>
                            <a href="whatsapp://add?number=044 999 585"><img src="{{asset('images/whatsapp.png')}}" alt="whatsapp"></a>
                            <span> 044 999 585</span>
                        </div>
                        <div>
                            <a href="tel:099 659 965 "> <img src="{{asset('images/phone.png')}}" alt="phone"> 099 659 965  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal mySellection  makeOffer">
        <div class="modal-overlay makeOffer-modal-toggle"></div>
        <div class="modal-wrapper modal-transition">

            <div class="modal-body">
                <div class="modal-content">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                    <div class="makeOffer_none">
                        <p>
                            {{Lang::get('lang.OFFER')}}
                        </p>
                        <p>
                            Buy it now price: <span>  {{$product->price}}</span>$
                        </p>
                        @if(empty($offer))
                            <span>3 offers left </span>
                        @elseif($offer->offer_count == 1  || $offer->status !== "declined")
                            <span>2 offers left</span>
                        @elseif($offer->offer_count == 2  || $offer->status !== "declined")
                            <span>1 offers left</span>
                        @else
                            <span style="color:red">You don't have any chance</span>
                        @endif
                    </div>
                    <div class="makeOffer_block">
                        <div>
                            <p>
                                <span>Your offer</span>
                                <span class="your-offer"></span>
                            </p>
                            <p>
                                <span>Shipping</span>
                                <span> 21.25$ - Expeditec shipping - USPS priority mail</span>
                            </p>
                            <p>
                                <span>Delivery</span>
                                <span>
                                   Estimated between Wed.
                                Nov 17 and Sat. Nov. 20
                                </span>
                            </p>
                            <p>
                                <span>Estimated total</span>
                                <span>870$</span>
                            </p>
                        </div>
                        <p>Applicable sales tax and other charges may be added at checkout</p>


                    </div>

                    <div class="form_make_offer">
                        <div class="makeOffer_none">
                            <h5>Your offer</h5>
                            <p class="your-offer">$</p>
                        </div>
                        {!! Form::open(['method' => 'OFFER','route' => ['ajaxRequest.make_offer']]) !!}
                        <div class="makeOffer_none">
                            @if(!$offer || $offer->offer_count !==3 && $offer->status !== "declined")
                                <div>
                                    <input type="hidden" class="offer-price" name="price" placeholder="Your offer">
                                    <input type="hidden" value="{{$product->id}}" name="product">
                                    <label for="makeOffer">
                                        <textarea class="offer-old-price" id="makeOffer" cols="30" rows="10" placeholder="Message(opptional)"></textarea>
                                    </label>
                                </div>
                                <div class="makeOffer_next">Review offer</div>
                            @else
                                <span style="color:red">You don't have any chance</span>
                            @endif
                        </div>
                        <div class="makeOffer_block">
                            <input type="submit" value="Send offer">
                            <div class="makeOffer_prev">Edit offer</div>
                            <p>
                                By tapping Send offer, you are agreeing to buy this item if
                                your offer is accepted and will be required to pay within 3 days.
                                The seller has 24 hours to respond
                            </p>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-login login">

        <div class="modal-overlay modal-login-toggle"></div>

        <div class="modal-wrapper modal-transition">

            <div class="modal-body">

                <div class="modal-content">

                    <img src="{{asset('images/logo.png')}}" alt="logo">

                    <div class="dFlex justify-between log_reg_toggle">
                        @if($user_url)
                            @if($role_id ===4)
                                <a class="is-{{$i_class}}" href="{{$user_url}}">Log Out</a>
                            @else
                                <a class="is-{{$i_class}}" href="{{$user_url}}">Dashboard</a>
                            @endif
                        @else
                            @if (isset($services) && !!$services)
                                <p class="sign_up">

                                    {{ Lang::get('lang.REG') }}
                                </p>
                            @endif

                            <p class="sign_in active_log">

                                Sign in

                            </p>
                        @endif
                    </div>

                    <div class="sign-up-in">

                        <p>with your social network</p>

                        <div class="reg_icon dFlex justify-center align-center">

                            <a href="#">

                                <img src="{{asset('images/icon_google.png')}}" alt="">

                            </a>

                            <span> or </span>

                            <a href="#">

                                <img src="{{asset('images/icon_fb.png')}}" alt="">

                            </a>

                        </div>

                    </div>

                    <div class="sign_up_content">

                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-item">

                                <div class="name">

                                    <label for="name">{{ Lang::get('lang.YOUR_NAME')}}</label>

                                    <input type="text" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="surname">

                                    <label for="surname"></label>

                                    <input type="text" id="surname" name="surname" placeholder="Surname">

                                </div>

                                <div class="companyName">

                                    <label for="companyName"></label>

                                    <input type="text" id="companyName" name="companyName" placeholder="Company name">

                                </div>

                                <div class="country">

                                    <label for="country"></label>

                                    <select name="country" id="country" >

                                        <option value="" disabled >country</option>

                                        <option value="" >country 1</option>

                                        <option value="" >country 2</option>

                                    </select>

                                </div>

                                <div class="region">

                                    <label for="region"></label>

                                    <select name="region" id="region" >

                                        <option value="" disabled >Region</option>

                                        <option value="" >Region 1</option>

                                        <option value="" >Region 2</option>

                                    </select>

                                </div>

                                <div class="city">

                                    <label for="city"></label>

                                    <select name="city" id="city" >

                                        <option value="" disabled >City</option>

                                        <option value="" >City 1</option>

                                        <option value="" >City 2</option>

                                    </select>

                                </div>

                                <div class="market">

                                    <label for="market"></label>

                                    <input type="text" id="market" name="market" placeholder="Market">

                                </div>

                                <div class="phone">

                                    <label for="phone"></label>

                                    <input type="number" id="phone" name="phone" placeholder="Phone Number">

                                </div>

                                <div class="email-inp">

                                    <label for="regEmail">{{ Lang::get('lang.EMAIL')}}</label>

                                    <input type="email" class="@error('email') is-invalid @enderror" id="regEmail" name="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="pass-inp">

                                    <label for="regPass">{{ Lang::get('lang.USER_PASS')}}</label>

                                    <input type="password" class="@error('password') is-invalid @enderror" id="regPass" name="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="pass-inp">

                                    <label for="confPass">{{ Lang::get('lang.CONFIRM_PASS') }}</label>

                                    <input type="password" id="confPass" name="password_confirmation" placeholder="Confirm Password">

                                </div>

                                <div class="choose_specialization">

                                    <div class="select_specialization toggle_class">

                                        <img src="{{asset('images/police.png')}}" alt="police">

                                        <span>Choose a specialization</span>

                                        <img class="icon_rotate" src="{{asset('images/choose.png')}}" alt="choose">

                                    </div>

                                    <div class="specialization">

                                        <label  for="repair" class="check container_inp">

                                            <input type="checkbox" checked="checked" name="repair" id="repair">

                                            Repair

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="clockworker" class="check container_inp">

                                            <input type="checkbox" name="clockworker" id="clockworker">

                                            Clockworker

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="polishing" class="check container_inp">

                                            <input type="checkbox" name="polishing" id="polishing">

                                            Polishing

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="golden_water" class="check container_inp">

                                            <input type="checkbox" name="golden_water" id="golden_water">

                                            Golden Water

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="laser_engraving" class="check container_inp">

                                            <input type="checkbox" name="laser_engraving" id="laser_engraving">

                                            Laser engraving

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="casting" class="check container_inp">

                                            <input type="checkbox" name="casting" id="casting">

                                            Casting

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="resize" class="check container_inp">

                                            <input type="checkbox" name="resize" id="resize">

                                            Resize

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="laser_inspection" class="check container_inp">

                                            <input type="checkbox" name="laser_inspection" id="laser_inspection">

                                            Laser inspection

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="calibration" class="check container_inp">

                                            <input type="checkbox" name="calibration" id="calibration">

                                            Calibration

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="rhodium" class="check container_inp">

                                            <input type="checkbox" name="rhodium" id="rhodium">

                                            Rhodium

                                            <span class="checkmark"></span>

                                        </label>

                                        <label for="rhodium" class="check container_inp">

                                            <input type="checkbox" name="rhodium" id="stone_placement">

                                            Stone placement

                                            <span class="checkmark"></span>

                                        </label>



                                    </div>



                                </div>

                            </div>



                            <div class="dFlex checked-user">

                                <label  for="regCheck" class="check container_inp">

                                    <input type="radio"  value="4" checked="checked" name="UserRole" id="regCheck">

                                    Buyer

                                    <span class="checkmark"></span>

                                </label>

                                <label for="seller" class="check container_inp">

                                    <input type="radio" value="2" name="UserRole" id="seller">

                                    Seller

                                    <span class="checkmark"></span>

                                </label>

                                <label for="manufacturer" class="check container_inp">

                                    <input type="radio" value="3" name="UserRole" id="manufacturer">

                                    Manufacturer

                                    <span class="checkmark"></span>

                                </label>

                                <label for="service" class="check container_inp">

                                    <input  type="radio" name="radio" id="service">

                                    Service

                                    <span class="checkmark"></span>

                                </label>

                            </div>

                            <div class="form-item" style="justify-content: center;display:flex;">

                                <label for="privacy_policy" class="check container_inp">

                                    <input  type="checkbox" name="privacy" id="privacy_policy">

                                    I agree with the <a href="#">privacy policy</a>

                                    <span class="checkmark"></span>

                                </label>

                            </div>

                            <button type="submit"> {{ Lang::get('lang.REG')}}</button>

                        </form>

                    </div>

                    <div class="sign_in_content active ">



                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="email-inp">

                                <label for="Email"></label>

                                <input type="email" class="@error('email') is-invalid @enderror" id="Email" name="email" placeholder="Email">

                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                            <div class="pass-inp">

                                <label for="pass"></label>

                                <input type="password" id="pass" class="@error('password') is-invalid @enderror" name="password" placeholder="Password">

                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror

                            <p>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">

                                        {{ __('Forgot Your Password?') }}

                                    </a>
                                @endif
                            </p>

                            <div class="check">

                                <input type="checkbox" id="check" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label for="check">{{ Lang::get('lang.REMEMBER_ME') }}</label>

                            </div>


                            <button type="submit">{{ Lang::get('lang.LOGIN') }}</button>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="modal mySellection"  >
        <div class="modal-overlay modal-toggle"></div>
        <div class="modal-wrapper modal-transition">
            <!--        <div class="modal-header">-->
            <!--            <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>-->
            <!--            <h2 class="modal-heading">This is a modal</h2>-->
            <!--        </div>-->

            <div class="modal-body">
                <div class="modal-content">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                    <p>
                        If you are a member, you can log in to access the products you
                        like when you come back
                        to the site, or you can become a member if you are not.
                    </p>
                    <a href="my-sellection.html" >Sign in</a>
                </div>
            </div>
        </div>
    </div>
@endsection
