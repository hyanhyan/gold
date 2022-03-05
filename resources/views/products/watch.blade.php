@extends('layouts.app')

@section('content')
    <section>

        <div class="collection-inner">

            <div class="container-inner">

                <div class="container">

                    <div class="collection">

                        <div class="newAdded-inner collectionAll shop_section">

                            <div class="filter_width">

                                <div class="title_fl">

                                    <p>Ֆիլտր</p>
                                    <div class="filter__clear"><a class="js_form_clear" href="{{route('shop')}}">Մաքրել ֆիլտրը</a></div>
                                </div>

                                <form action="#">

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Գինը</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="price_starting" class="price_starting">

                                                    Սկսած

                                                    <input class="field" type="number" name="min-price" id="price_starting">

                                                </label>

                                                <label for="price_until" class="price_starting">

                                                    Մինչև

                                                    <input class="field" type="number" name="max-price" id="price_until">

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>{!! Lang::get('lang.METAL') !!}</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="metal_gold">

                                                    <input class="field" type="checkbox" value="1" name="metal_id" id="metal_gold">

                                                {!! Lang::get('lang.GOLD') !!}

                                                <!--                                            <span class="checkmark"></span>-->

                                                </label>

                                                <label for="metal_silver">

                                                    <input class="field" type="checkbox" value="2" name="metal_id" id="metal_silver">

                                                    {!! Lang::get('lang.SILVER') !!}

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>{!! Lang::get('lang.FOR_WHOM') !!}</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="for_whom_women">

                                                    <input class="field" type="checkbox" value="2" name="m_w_c" id="for_whom_women">

                                                    {{Lang::get('lang.WOMEN')}}

                                                </label>

                                                <label for="for_whom_men">

                                                    <input class="field" type="checkbox" value="1" name="m_w_c" id="for_whom_men">

                                                    {{Lang::get('lang.MEN')}}

                                                </label>

                                                <label for="for_whom_children">

                                                    <input class="field" type="checkbox" value="3" name="m_w_c" id="for_whom_children">

                                                    {{Lang::get('lang.CHILDREN')}}

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>{!! Lang::get('lang.TYPE') !!}</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>
                                                @foreach($productType as $prType)

                                                    <label for="type_rings">

                                                        <input class="field" type="checkbox" value="{{$prType->id}}" typeCategory="{{ $prType->product_global_type }}" forWhom="{{ $prType->product_permission }}" name="product_type_id" id="type_rings">

                                                        {{ Lang::get('lang.'.$prType->name)  }}

                                                    </label>
                                                @endforeach
                                            </div>

                                        </div>

                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Certificate</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="certificate_yes">

                                                    <input class="field" type="checkbox" name="certificate_yes" id="certificate_yes">

                                                    Yes

                                                </label>

                                                <label for="certificate_no">

                                                    <input class="field" type="checkbox" name="certificate_no" id="certificate_no">

                                                    No

                                                </label>

                                            </div>

                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Gemstone</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="gemstone_yes">

                                                    <input class="field" type="checkbox" name="gemstone_yes" id="gemstone_yes">

                                                    Yes

                                                </label>

                                                <label for="gemstone_no">

                                                    <input class="field" type="checkbox" name="gemstone_no" id="gemstone_no">

                                                    No

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Weight</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="weight_starting" class="price_starting">

                                                    Starting

                                                    <input class="field" type="number" name="min_weight" id="weight_starting" value="">

                                                </label>

                                                <label for="price_until" class="price_starting">

                                                    Until

                                                    <input class="field" type="number" name="max_weight" id="weight_until" value="">

                                                </label>

                                            </div>



                                        </div>



                                    </div>


                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>{{Lang::get('lang.COLOR')}}</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div class="d-flex">
                                                <div style="width:24px;height: 24px;background-color: #E5CD86;border-radius: 50%">
                                                    <label for="color">

                                                        <input class="field" type="checkbox" name="color" value="yellow" id="color_1">

                                                    </label>
                                                </div>
                                                <div style="width:24px;height: 24px;background-color: #FFCBBD;border-radius: 50%">

                                                    <label for="color">

                                                        <input class="field" type="checkbox" name="color" value="pink" id="color_2">

                                                    </label>
                                                </div>
                                                <div style="width:24px;height: 24px;background-color: #C69280;border-radius: 50%">
                                                    <label for="color">

                                                        <input class="field" type="checkbox" name="color" value="red" id="color_2">

                                                    </label>
                                                </div>
                                                <div style="width:24px;height: 24px;background-color: #E4E4E4;border-radius: 50%"></div>

                                                <label for="color">
                                                    <input class="field" type="checkbox" name="color" value="white" id="color_2">

                                                </label>
                                            </div>


                                        </div>


                                    </div>


                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Condition</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="condition_new">

                                                    <input class="field" type="checkbox" value="0" name="used" id="condition_new">

                                                    New

                                                </label>

                                                <label for="condition_used">

                                                    <input class="field" type="checkbox" name="used" value="1" id="condition_used">

                                                    Used

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Origin</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="origin_armenia">

                                                    <input class="field" type="checkbox" value="1" name="loc_glob" id="origin_armenia">

                                                    Armenian

                                                </label>

                                                <label for="origin_imported">

                                                    <input class="field" type="checkbox" value="0" name="loc_glob" id="origin_imported">

                                                    Imported

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Country</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="country_armenia">

                                                    <input class="field" type="checkbox" name="country_armenia" id="country_armenia">

                                                    Armenian

                                                </label>

                                                <label for="country_artsakh">

                                                    <input class="field" type="checkbox" name="country_artsakh" id="country_artsakh">

                                                    Artsakh

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Region</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="region_yerevan">

                                                    <input class="field" type="checkbox" name="market" value="YEREVAN" id="region_yerevan">

                                                    Yerevan

                                                </label>

                                                <label for="region_aragatsotn">

                                                    <input class="field" type="checkbox" name="market" value="ARAGATSOTN" id="region_aragatsotn">

                                                    Aragatsotn

                                                </label>

                                                <label for="region_ararat">

                                                    <input class="field" type="checkbox" name="market" value="ARARAT" id="region_ararat">

                                                    Ararat

                                                </label>

                                                <label for="region_armavir">

                                                    <input class="field" type="checkbox" name="market" value="ARMAVIR" id="region_armavir">

                                                    Armavir

                                                </label>

                                                <label for="region_gegharkunik">

                                                    <input class="field" type="checkbox" name="market" value="GEGHARKUNIK" id="region_gegharkunik">

                                                    Gegharkunik

                                                </label>

                                                <label for="region_kotayk">

                                                    <input class="field" type="checkbox" name="market" value="KOTAYK" id="region_kotayk">

                                                    Kotayk

                                                </label>

                                                <label for="region_lori">

                                                    <input class="field" type="checkbox" name="market" value="LORI" id="region_lori">

                                                    Lori

                                                </label>

                                                <label for="region_shirak">

                                                    <input class="field" type="checkbox" name="market" value="SHIRAK" id="region_shirak">

                                                    Shirak

                                                </label>

                                                <label for="region_syunik">

                                                    <input class="field" type="checkbox" name="market" value="SYUNIK" id="region_syunik">

                                                    Syunik

                                                </label>

                                                <label for="region_tavush">

                                                    <input class="field" type="checkbox" value="TAVUSH" name="market" id="region_tavush">

                                                    Tavush

                                                </label>

                                                <label for="region_vayots_dzor">

                                                    <input class="field" type="checkbox" name="market" value="VAYOTS_DZOR" id="region_vayots_dzor">

                                                    Vayots Dzor

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>City</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <ul>

                                                <li>

                                                    Alphabetically

                                                </li>

                                                <li>

                                                    Sort by price: low to high

                                                </li>

                                            </ul>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Market</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <ul>

                                                <li>

                                                    Alphabetically

                                                </li>

                                                <li>

                                                    Sort by price: low to high

                                                </li>

                                            </ul>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Year</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="year" class="price_starting">

                                                    <input class="field" type="number" name="year" id="year">

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Brand</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="brend">

                                                    <input class="field" type="checkbox" name="brend" id="brend">

                                                    <img src="" alt="">

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>{{Lang::get('lang.GEAR')}}</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>
                                                @foreach($productType as $prType)

                                                <label for="mechanical">

                                                    <input class="field" type="checkbox" value="{{$prType->id}} " typeCategory="{{ $prType->product_global_type }}" forWhom="{{ $prType->product_permission }}" name="product_type_id" id="mechanical">

                                                    {{ Lang::get('lang.'.$prType->name)  }}

                                                </label>
                                                @endforeach
                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization ">

                                        <div class="select_specialization toggle_class" >

                                            <span>Bracelet belt</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="chain">

                                                    <input class="field" type="checkbox" value="1" name="belt_type" id="chain">

                                                    {{Lang::get('lang.GOLD')}}

                                                </label>

                                                <label for="belt">

                                                    <input class="field" type="checkbox" value="2" name="belt_type" id="belt">

                                                    {{Lang::get('lang.SILVER')}}

                                                </label>

                                                <label for="bracelet_other">

                                                    <input class="field" type="checkbox" value="3" name="belt_type" id="bracelet_other">

                                                    {{Lang::get('lang.LEATHER')}}

                                                </label>
                                                <label for="bracelet_other">

                                                    <input class="field" type="checkbox" value="4" name="belt_type" id="bracelet_other">

                                                    {{Lang::get('lang.OTHER')}}

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                    <div class="choose_specialization">

                                        <div class="select_specialization toggle_class" >

                                            <span>Name</span>

                                            <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                        </div>

                                        <div class="specialization filter__item" >

                                            <div>

                                                <label for="name_one">

                                                    <input class="field" type="checkbox" name="name_one" id="name_one">

                                                    Munze Osterreich

                                                </label>

                                                <label for="name_two">

                                                    <input class="field" type="checkbox" name="name_two" id="name_two">

                                                    Argor Heraeus

                                                </label>

                                            </div>



                                        </div>



                                    </div>

                                </form>

                            </div>
                            <div class="catalog__wrap">
                                <div class="newAdded_sellection catalog__wrap_main" >
                                    @foreach($products as $product)

                                        <div class="product_item">

                                            <div class="slider-item">

                                                <div>

                                                    <div class="slider-item-img">

                                                        <a href="{{route('shop.product', $product->id)}}">
                                                            @if(isset($product->pictures['img_name']))
                                                                <img src="{{ asset(  '/uploads/products/' . $product->pictures['img_name'] )}}" alt="collection">
                                                            @elseif(isset($product->pictures[0]))
                                                                <img src="{{ asset(  '/uploads/products/' . $product->pictures[0])}}" alt="collection">
                                                            @endif
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
                            <div class="sort_by">

                                <div class="choose_specialization">

                                    <div class="select_specialization toggle_class" >

                                        <span>Order by</span>

                                        <img class="icon_rotate " src="{{asset('images/choose.png')}}" alt="choose">

                                    </div>

                                    <div class="specialization filter__item" >

                                        <ul>

                                            <li>

                                                Alphabetically

                                            </li>

                                            <li>

                                                Sort by price: low to high

                                            </li>

                                            <li>

                                                Sort by price: high to low

                                            </li>

                                            <li>

                                                Most viewed

                                            </li>

                                            <li>

                                                Newest

                                            </li>

                                            <li>

                                                Sort by weight: low to high

                                            </li>

                                            <li>

                                                Sort by weight: high to low

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
@endsection
