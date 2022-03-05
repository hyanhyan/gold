@extends('layouts.admin')


@section('content')
@include('admin.includes.breadcrumb')
<style>
    .modal-backdrop {
        z-index: 0 !important;
        opacity: 0 !important;
    }
</style>
@if(Auth::user()->hasRole('Admin'))

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
                    <img src="{{asset('images/admin_profile.png')}}" alt="prof">
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
                <label for="type_category"></label>
                <select name="type_category" id="type_category">
                    <option value="1">Rings</option>
                    <option value="2">Rings 1</option>
                </select>
            </div>

        </div>
        <div class="table_product">
            <table id="test">
                <tr>
                    <th>No</th>
                    @if (Auth::user()->hasRole('Admin'))
                        <th >{{Lang::get('lang.USER_NAME')}}</th>
                    @endif
                    <th >{{Lang::get('lang.TYPE')}}</th>
                    <th >{{Lang::get('lang.ACTIVE')}}</th>
                    <th>{{Lang::get('lang.ACTION')}}</th>
                </tr>
                @foreach ($data as $key => $product)
                    @if($product->status != "accepted" && $product->status !="pending")
                        <tr id="{{$product->id}}">
                            <td >{{ ++$i }}</td>
                            @if (Auth::user()->hasRole('Admin'))
                                <td >{{ $user[$product->user_id] }} </td>
                            @endif
                            <td>{{Lang::get('lang.'.$product->product_type)}}</td>


                            <td   class="img_product">
                                @if($product->pictures)
                                    <div>
                                        <div class="img_home">
                                            <img onclick="ShowModal('myModal-<?= $product->id?>',this)" src="{{ asset('/uploads/products/' . $product->pictures[0]['img_name'] )}}" alt="picture_product_test">
                                        </div>
                                        <div class="img-min each">
                                            @foreach ($product->pictures as $key => $picture)
                                                    <img onclick="ShowModal('myModal-<?= $product->id?>',this)" data-id={{$key}} src="{{ asset('/uploads/products/' . $picture['img_name'] )}}"  width="100px" height="100px">
                                                 @endforeach

                                        </div>
                                    </div>
                                @endif
                            </td>
                    <td class="img_product modal-toggle" >
                        <div class="action">
                            <a  href="{{ route('shop.product',$product->id) }}">
                                <img src="{{asset('images/picture_view.png')}}"></a>

                            <a href="#" id="del-row" data-id="{{$product->id}}">
                                <img src="{{asset('images/picture_del.png')}}" alt="view">
                            </a>
                            <a href="#">
                                @if (Auth::user()->hasRole('Admin'))
                                <img class="accept" data-id="{{$product->id}}" src="{{asset('images/picture_done.png')}}" alt="view">
                                @endif
                            </a>

                        </div>
                    </td>

                            <div class="img-modal img_slider"  id="myModal-<?= $product->id; ?>">
                                <div class="modal-overlay modal-toggle" id="del-modal-img"></div>
                                <div class="modal-wrapper modal-transition">
                                    <div class="modal-body">
                                        <div class="modal-content">
                                            <div>
                                                <a href="#" class="del" id="img-slide-del">
                                                    <img src="{{asset('images/picture_del.png')}}" alt="view">
                                                </a>
                                                <div class="img-request-slide">
                                                    @foreach ($product->pictures as $key => $picture)
                                                        <div>
                                                                <img class="myImg" id="slide-one-myModal-<?= $product->id; ?>" src="{{ asset('/uploads/products/' . $picture['img_name'] )}}" width="100px" height="500px">
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <div class="slider-nav">
                                                    @foreach ($product->pictures as $key => $picture)
                                                        <img  class="myImg" data-id={{$key}} src="{{ asset('/uploads/products/' . $picture['img_name'] )}}"  width="100px" height="100px">
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <div class=" mySellection  delete-img">
                            <div class="modal-overlay delete-modal-toggle" id="del-modal"></div>
                            <div class="modal-wrapper modal-transition">

                                <div class="modal-body">
                                    <div class="modal-content">
                                        <img src="{{asset('images/logo.png')}}" alt="logo">
                                        <div class="form_make_offer">
                                            <form action="{{route('product.decline')}}" method="post" class="del-img-form" data-url="{{route('del-pic')}}">
                                                @csrf
                                                <input type="hidden" value="{{$product->user_id}}" name="to_id" class="to_id">
                                                <input type="hidden" value="{{$product->id}}" name="id" class="product_id">
                                                <input type="hidden"  name="product_img" class="prod-img">
                                                <div class="message-del-picture">
                                                    <div class="modal-body user-name">
                                                        {{ $user[$product->user_id]}}
                                                    </div>
                                                    <div>
                                                        <label for="makeOffer">
                                                            <textarea name="message" id="makeOffer" cols="30" rows="20" class="user-message" placeholder="Message(opptional)"></textarea>
                                                        </label>
                                                    </div>
                                                    <input type="submit" class="decline" value="Send and delete" data-id="{{$product->id}}">

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" mySellection  del-img modal fade">
                            <div class="modal-overlay delete-modal-toggle" id="del-mod"></div>
                            <div class="modal-wrapper modal-transition">

                                <div class="modal-body">
                                    <div class="modal-content">
                                        <img src="{{asset('images/logo.png')}}" alt="logo">
                                        <div class="form_make_offer">
                                            <form action="{{route('del-pic')}}" method="post" class="delete-img-form" data-url="{{route('del-pic')}}">
                                                @csrf
                                                <input type="hidden" value="{{$product->user_id}}" name="to_id" class="to_id">
                                                <input type="hidden" value="{{$product->id}}" name="id" class="product_id">
                                                <input type="hidden"  name="product_img" class="prod-img">
                                                <div class="message-del-picture">
                                                    <div class="modal-body user-name">
                                                        {{ $user[$product->user_id]}}
                                                    </div>
                                                    <div>
                                                        <label for="makeOffer">
                                                            <textarea name="message" id="makeOffer" cols="30" rows="20" class="user-message" placeholder="Message(opptional)"></textarea>
                                                        </label>
                                                    </div>
                                                    <input type="submit" class="del-img-slide" value="Send and delete" data-id="{{$product->id}}">

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>
            <div class="modal fade" id="Mymodal">
                <div class="modal-dialog">
                    <div class="modal-content delete-content">
                        <div class="modal-header d-block">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="d-flex justify-content-center">
                            <img src="{{asset('images/logo.png')}}" width="120px" height="87px">
                            </div>
                        </div>
                        <div class="modal-body user-name">
                            {{ $user[$product->user_id]}}
                        </div>
                        <form action="{{route('del-pic')}}" method="post" class="del-img-form">
                            @csrf
                            <input type="hidden" value="{{$product->user_id}}" name="to_id" class="to_id">
                            <input type="hidden" value="{{$product->id}}" name="product_id" class="product_id">
                            <input type="hidden"  name="product_img" class="prod-img">
                            <div class="d-flex justify-content-center">
                                <textarea class="product-message" name="message"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default send-img-message" data-id="{{$product->id}}">Send and delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
@else
    <input type="hidden" id="prodOrdPath" value="{{ route("ajaxRequest.post") }}">
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <input type="text" id="boot-search" class="form-control" placeholder="Search all fields e.g. HTML">
        </div>
        <div class="col-lg-6 margin-tb">
            @if(!Auth::user()->hasRole('Admin'))
            <div style="float: right;">
                <a class="btn btn-success" href="{{ route('product.create') }}"> {{Lang::get('lang.PRODUCT_ADD')}}</a>
            </div>
                @endif
        </div>
<table id="product-table"  class="table table-bordered">
    <thead>
    <tr>
        <th >No</th>
        @if (Auth::user()->hasRole('Admin'))
            <th >{{Lang::get('lang.USER_NAME')}}</th>
        @endif
        <th >{{Lang::get('lang.CATEGORY')}}</th>
        <th >{{Lang::get('lang.PRODUCT_NAME')}}</th>
        <th >{{Lang::get('lang.PRODUCT_CODE')}}</th>
        <th >{{Lang::get('lang.PRODUCT_PRICE')}}</th>
        <th >{{ Lang::get('lang.METAL') }}</th>
        <th >{{ Lang::get('lang.FINENESS') }}</th>
        <th >{{ Lang::get('lang.COLOR') }}</th>
        <th >{{Lang::get('lang.PRODUCT_WEIGHT')}}</th>
        <th >{{Lang::get('lang.PRODUCT_PUBLISH')}}</th>
        <th >{{Lang::get('lang.PRODUCT_WHENCE')}}</th>
        <th >{{Lang::get('lang.FOR_WHOM')}}</th>
        <th>{{Lang::get('lang.ACTION')}}</th>
        <th>{{Lang::get('lang.PHOTO')}}</th>
        <th>{{Lang::get('lang.VIEWED')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $product)
{{--        {{dd($product)}$product}--}}
        <tr id="{{$product->id}}">
            <td >{{ ++$i }}</td>
            @if (Auth::user()->hasRole('Admin'))
                <td >{{ $user[$product->user_id] }} </td>
            @endif
            <td>{{Lang::get('lang.'.$product->product_global_name)}}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ Lang::get('lang.'.$product->metal_name)  }}</td>
            <td>{{ $product->rate_purity}}</td>
            <td>{{ $product->color}}</td>
            <td>{{ $product->weight }}</td>
            <td>{{ $product->published ? Lang::get('lang.PRODUCT_STATUS_ENABLE') : Lang::get('lang.PRODUCT_STATUS_DISABLE') }}</td>
            <td>{{ 1 === $product->loc_glob ? Lang::get('lang.PRODUCT_ARMENIAN') : Lang::get('lang.PRODUCT_IMPORTED') }}</td>
            <td>{{ (1 === $product->m_w_c ? Lang::get('lang.WOMEN') : 2 === $product->m_w_c) ? Lang::get('lang.MEN') : Lang::get('lang.CHILDREN')}}</td>
            <td class="d-flex">
                <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">{{  Lang::get('lang.EDIT') }}</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    {{Lang::get('lang.DELETE')}}
                </button>
                <!-- Modal -->
                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog cursor-default" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{Lang::get('lang.DELETE')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this product</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                                {!! Form::submit( Lang::get('lang.DELETE') , ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>




                <a class="btn btn-secondary" href="{{route('product.copy', 'prod='.$product->id) }}"><i class="icon-copy"></i></a>
            </td>
            <td>
                <div class="each d-flex">
                    @if($product->pictures)
                @foreach ($product->pictures as $key => $picture)
                    <div class="change-img d-flex">
                        @isset($picture->img_name)

                            <img class="myImg" @if($picture->img_status === "declined") style="border:1px solid yellow" @endif data-id={{$key}} src="{{ asset('/uploads/products/' . $picture->img_name )}}" alt="{{ $picture->img_name }}" width="100px" height="100px">

                                @endisset
                    </div>
                @endforeach
                        @endif
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif


{{--{{ $data->render() }}--}}
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{?>

@append
@section('tableDnD-js')
    @include( 'layouts.include.tableDnD')
<?php } ?>
@endsection
