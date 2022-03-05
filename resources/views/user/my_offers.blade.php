@extends('layouts.admin')
@section('content')
    @include('admin.includes.breadcrumb')
<p>Offers</p>
@foreach($products as $product)
    @foreach($product->offers as $offer)
        @if($offer->status === "pending")
        <div style="border:1px solid #8B3A00;width: 400px;height: auto;margin-top:40px">
            <img style="width:80px;height: 80px;padding:10px; "  src="{{ asset('/uploads/products/' .json_decode($product->pictures,true)[0]['img_name'])}}">
            <p>{{$product->title}}</p>
        <p>Price: {{$product->price}}</p>
        <p>Offer price: {{$offer->price}}</p>
        <p>Buyer: {{$offer->userName()}}</p>
            <button data-id="{{$offer->id}}" class="btn btn-success acceptOffer">Agree</button>
            <button data-id="{{$offer->id}}" class="btn btn-danger declineOffer">Refuse</button>
            <button class="btn btn-secondary changeOffer" data-toggle="modal" data-target="#makeOffer">Change price</button>
        </div>
        <div class="modal fade mySellection  makeOffer" id="makeOffer">

            <div class="modal-overlay makeOffer-modal-toggle"></div>

            <div class="modal-wrapper modal-transition">



                <div class="modal-body">

                    <div class="modal-content">

                        <img src="images/logo.png" alt="logo">

                        <div class="makeOffer_none">

                            <p>

                                Make an offer

                            </p>

                            <p>

                                Buy it now price: <span>850$</span>

                            </p>

                            <span>3 offers left </span>

                        </div>

                        <div class="makeOffer_block">

                            <div>

                                <p>

                                    <span>Your offer</span>

                                    <span> 850$</span>

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

                                <p>$</p>

                            </div>

                            <form action="#">

                                <div class="makeOffer_none">

                                    <div>

                                        <label for="makeOffer">

                                            <textarea name="make_offer" id="makeOffer" cols="30" rows="10" placeholder="Message(opptional)"></textarea>

                                        </label>

                                    </div>

                                    <div class="makeOffer_next">Review offer</div>

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



                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endif
    @endforeach
    @endforeach
@endsection
