<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>

    {{--    <link href="{{ asset('/admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/admin/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('slick/slick-theme.css')}}">


    <!-- Theme Styles -->
    <link href="{{ asset('/admin/assets/css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

{{--boostrap table--}}

@yield('top-scripts')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>

<section>
    <div class="admin-inner">
        <div class="admin-container">
            <div class="admin-page  ">
                    <div class="admin-page-content">
                        <div class="admin-header">
                            <div class="admin-menu">
                                <div class="menu">
                                    <img src="{{asset('images/menu_bg.png')}}" alt="menu">
                                </div>
                                <div class="admin-profile">
                                    <div>
                                        <div class="dropdown">
                                            <button class="dropbtn">ENG
                                                <img src="{{asset('images/select.png')}}" alt="sel">
                                            </button>
                                            <div class="dropdown-content animate" style="min-width:80px;">
                                                <a href="#">ENG</a>
                                                <a href="#">AM</a>
                                                <a href="#">RU</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{asset('images/admin_profile.png')}}'" alt="prof">
                                    </div>



                                </div>
                            </div>

                        </div>
                        <div class="page-content">
                            <div class="filter_product">
                                <div class="search">
                                    <form action="#">
                                        <label for="search_product">Pictures</label>
                                        <input type="search" name="search_picture" placeholder="Search" id="search_product">
                                    </form>
                                </div>
                                <div class="filter">

                                <form>

                                      <label for="type_category"></label>
                                      <select name="type_category" id="type_category">
                                        <option value="">Select type</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}" selected >{{Lang::get('lang.'.$type->name)}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="user" data-id="{{$user->id}}">
                                   </form>
                                </div>
                                    <span>
                                      25
                                    </span>
                                </div>

                            </div>
                            <div class="table_product">
                                <div class="all-img">
                                    @foreach($products as $product)
                                    <div class="pictures_item modal-toggle" id="all-pr">
                                        <img onclick="ShowModal('myModal-<?= $product->id?>',this)" src="{{ asset('/uploads/products/'.json_decode($product->pictures)[0])}}" alt="pictures all" width="200px">
                                        <p>{{$user->name}} </p>
                                    </div>
                                        <div class="img-modal img_slider"  id="myModal-<?= $product->id; ?>">
                                            <div class="modal-overlay modal-toggle" id="del-modal-img"></div>
                                            <div class="modal-wrapper modal-transition">
                                                <div class="modal-body">
                                                    <div class="modal-content">
                                                        <div>
                                                            <a href="#" class="del" id="all-slide-del">
                                                                <img src="{{asset('images/picture_del.png')}}" alt="view">
                                                            </a>
                                                            <div class="img-request-slide">
                                                                @foreach (json_decode($product->pictures) as $key => $picture)
                                                                    <div>
                                                                        <img class="myImg" id="slide-one-myModal-<?= $product->id; ?>" src="{{ asset('/uploads/products/' . $picture )}}" width="100px" height="500px">
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                            <div class="slider-nav">
                                                                @foreach (json_decode($product->pictures) as $key => $picture)
                                                                    <img  class="myImg" data-id={{$key}} src="{{ asset('/uploads/products/' . $picture )}}"  width="100px" height="100px">
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mySellection  delete-img" >
                                            <div class="modal-overlay delete-modal-toggle"></div>
                                            <div class="modal-wrapper modal-transition">

                                                <div class="modal-body">
                                                    <div class="modal-content">
                                                        <img src="{{asset('images/logo.png')}}" alt="logo">
                                                        <div class="form_make_offer">
                                                            <form action="{{route('product.del')}}" method="post" class="delete-img-form-prods">
                                                                @csrf
                                                                <input type="hidden" value="{{$product->user_id}}" name="to_id" class="to_id_prods">
                                                                <input type="hidden" value="{{$product->id}}" name="id" class="product_id_prods">
                                                                <input type="hidden"  name="product_img" class="prod-img_prods">
                                                                <div class="message-del-picture">
                                                                    <div class="modal-body user-name">
                                                                        {{ $user[$product->user_id]}}
                                                                    </div>
                                                                    <div>
                                                                        <label for="makeOffer">
                                                                            <textarea name="message" id="makeOffer" cols="30" rows="20" class="user-message_prods" placeholder="Message(opptional)"></textarea>
                                                                        </label>
                                                                    </div>
                                                                    <input type="submit"  value="Send and delete del-prods" data-id="{{$product->id}}">
                                                                </div>
                                                            </form>
                                                        </div>
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

<!-- Javascripts -->
<script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/concept.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/pages/dashboard.js') }}"></script>

{{--boostrap table--}}
<script src="{{ asset('/admin/assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>


@yield('tableDnD-js')
@yield('attribute-js')



@yield('bottom-scripts')
</body>
</html>





{{-- <form>--}}

{{--  <select name="type" class="form-control type-select-all">--}}
{{--        <option value="">Select type</option>--}}
{{--        @foreach($types as $type)--}}
{{--            <option value="{{$type->id}}" selected >{{Lang::get('lang.'.$type->name)}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <input type="hidden" class="user" data-id="{{$user->id}}">--}}
{{--   </form>--}}
{{--    <div class="d-flex flex-wrap all-img">--}}
{{--        @foreach($products as $product)--}}
{{--            <div class="change-img d-flex flex-wrap justify-content-between">--}}
{{--            @foreach(json_decode($product->pictures) as $key => $picture)--}}
{{--                    @if($picture->img_status !== "declined")--}}
{{--                    <img class="user-images" src="{{ asset('/uploads/products/'.$picture->img_name)}}" width="100px" height="100px">--}}
{{--             @endif--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--            <div>--}}
{{--        </div>--}}

{{--                <div id="myModalll" class="modal modal-all">--}}
{{--                    <span class="close close-all">&times;</span>--}}
{{--                    <div class="owl-carousel">--}}
{{--                        <img class="modal-content openedImg" id="img0" data-id="">--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <button class="del-img btn-danger">Delete</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="gallery_bottom_bar d-flex" style="margin: 0 auto;--}}
{{--             width: 50%;--}}
{{--            max-width: 300px;">--}}
{{--                    </div>--}}
{{--                    <div id="captionn"></div>--}}
{{--                </div>--}}

{{--   <div id="myModal" class="modal modal-all">--}}
{{--       <span class="close close-all">&times;</span>--}}
{{--       <div class="owl-carousel">--}}
{{--                   <img class="modal-content openedImg" id="img01" data-id="">--}}
{{--           <div class="d-flex justify-content-center">--}}
{{--               <button class="del-img btn-danger">Delete</button>--}}
{{--           </div>--}}
{{--       </div>--}}
{{--       <div class="gallery_bottom_bar d-flex" style="margin: 0 auto;--}}
{{--             width: 50%;--}}
{{--            max-width: 300px;">--}}
{{--           @foreach(json_decode($product->pictures) as $key => $picture)--}}
{{--               @if($picture->img_status !== "declined")--}}
{{--               <div class="gallery_bar_item">--}}
{{--                   <img src="{{ asset('/uploads/products/' . $picture->img_name)}}" width="100" height="100">--}}
{{--                   <div class="d-flex justify-content-center">--}}
{{--                       <button class="del-img btn-danger">Delete</button>--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--               @endif--}}
{{--           @endforeach--}}
{{--       </div>--}}
{{--       <div id="caption"></div>--}}
{{--   </div>--}}
{{--            <div class="d-flex">--}}
{{--                {{$user->name}}--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}

{{-- <div class="modal fade" id="Mymodal">--}}
{{--       <div class="modal-dialog">--}}
{{--           <div class="modal-content delete-content">--}}
{{--               <div class="modal-header d-block">--}}
{{--                   <button type="button" class="close" data-dismiss="modal">×</button>--}}
{{--                   <div class="d-flex justify-content-center">--}}
{{--                       <img src="{{asset('images/logo.png')}}" width="120px" height="87px">--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--               <div class="modal-body user-name">--}}
{{--                   {{ $user->name}}--}}
{{--               </div>--}}
{{--               <form action="{{route('del-pic')}}" method="post" class="del-img-form">--}}
{{--                   @csrf--}}
{{--                   <input type="hidden"  name="product_img" class="prod-img">--}}
{{--                   <input type="hidden" value="{{$product->user_id}}" name="to_id" class="to_id">--}}
{{--                   <input type="hidden" value="{{$product->id}}" name="product_id" class="product_id">--}}
{{--                   <div class="d-flex justify-content-center">--}}
{{--                       <textarea class="product-message" name="message"></textarea>--}}
{{--                   </div>--}}
{{--                   <div class="modal-footer">--}}
{{--                       <button type="submit" class="btn btn-default send-img-message">Send and delete</button>--}}
{{--                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                   </div>--}}
{{--               </form>--}}


{{--           </div>--}}
{{--       </div>--}}
{{--   </div>--}}

