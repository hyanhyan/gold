@extends('layouts.app')

@section('content')
<section>

    <div class="collection-inner">

        <div class="container-inner">

            <div class="container">

                <div class="about_us">

                    <h1>Contact Us</h1>

                    <div class="contact_content">

                        <div>

                            <a href="tel:+374 98 99 99 99 ">

                                <img src="{{asset('images/contact_phone_ic.png')}}" alt="phone">

                                <p>

                                    +374 98 99 99 99

                                </p>

                            </a>

                        </div>

                        <div>

                            <a href="mailto:+374 98 99 99 99 ">

                                <img src="{{asset('images/contact_mail.png')}}" alt="mail">

                                <p>

                                    info@rodlie.am

                                </p>

                            </a>

                        </div>

                        <div>

                            <a href="#">

                                <img src="{{asset('images/contact_address_ic.png')}}" alt="address">

                                <p>

                                    Pushkin 21

                                </p>

                            </a>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </div>

</section>

@endsection
