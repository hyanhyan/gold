@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
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

                        </div>
                        <div class="table_product">
                            <table id="product-table">

                                <tr>
                                    <th>
                                        No
                                    </th>
                                    @if (Auth::user()->hasRole('Admin'))
                                        <th >{{Lang::get('lang.USER_NAME')}}</th>
                                    @endif
                                    <th>{{Lang::get('lang.TYPE')}}</th>
{{--                                    <th>{{Lang::get('lang.PRODUCT_NAME')}}</th>--}}
                                    <th>{{Lang::get('lang.ACTIVE')}}</th>
                                    <th>{{Lang::get('lang.ACTION')}}</th>
                                </tr>
                                @foreach($data->unique('user_id') as $product)
                                    @if($product->status === "accepted")
                                <tr data-id="{{$product->id}}">
                                    <td >{{ ++$i }}</td>
                                    @if (Auth::user()->hasRole('Admin'))
                                        <td class="user-info" data-id="{{ $product->user_id}}">{{ $user[$product->user_id] }} </td>
                                    @endif
                                    <td class="select-type">
                                        <div class="filter">
                                            <label for="type_category"></label>
                                            <select name="type_category" id="type_category" class="type-select">
                                                @foreach($types as $type)
                                                    @if(!$type)
                                                    <option value="{{$type->id}}" selected contenteditable="false" >{{Lang::get('lang.'.$type->name)}}</option>
                                                    @else
                                                        <option value="{{$type->id}}" selected>{{Lang::get('lang.'.$type->name)}}</option>
                                                        @endif
                                                        @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="img_product ">
                                        <div class="each">
                                        <a>
                                            <div class="img_home change-img ">
                                                <img class="user-img" src="{{ asset('/uploads/products/jewellery-default.png' )}}" data-id="{{$product->id}}" width="100px" height="100px">
                                            </div>
                                        </a>
                                        </div>
                                    </td>
                                    <td class="img_product ">
                                        <div class="action">
                                            <a href="#">
                                                <img src="{{ asset('images/picture_view.png')}}" alt="view">
                                            </a>
                                            @if (Auth::user()->hasRole('Admin'))
                                            <a href="#" class="delete-modal-toggle">
                                                <img src="{{ asset('images/picture_del.png')}}" alt="view">
                                            </a>
                                            @endif
                                            <!--                      <a href="#">-->
                                            <!--                        <img src="../images/picture_done.png" alt="view">-->
                                            <!--                      </a>-->

                                        </div>
                                    </td>
                                </tr>
                                        <div class=" mySellection  delete-img">
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
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
@endsection
