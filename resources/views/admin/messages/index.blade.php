@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
    <h4>Message</h4>
    @if(!Auth::user()->hasRole('Admin'))
        <p>If you have any questions you san send message to admin</p>
        <button class="message" onclick="ShowModal('myModall')" style="margin-bottom:20px;background: #c1843d">Write a message</button>
    <div class="modal fade modal-div" id="myModall">
        <div class="modal-dialog">
            <div class="modal-content delete-content" style="height: auto !important;">
                <div class="modal-header d-block">
                    <button type="button" class="close closing" data-dismiss="modal">×</button>
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/logo.png')}}" width="120px" height="87px">
                    </div>
                </div>
                <div class="modal-body user-name">
                    Admin
                </div>
                <form action="{{route('sendMessage')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  name="to_id" value="{{$admin->id}}">
                    <input type="hidden"  name="product" value="1">
                        <div class="d-flex justify-content-center">
                            <input type="file" name="images[]" multiple>
                        </div>
                    <div class="d-flex justify-content-center">
                        <textarea class="product-message" name="message" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Send</button>
                        <button type="button" class="btn btn-default closing"  data-dismiss="modal">Close</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->messages)
        @if(!Auth::user()->hasRole('Admin'))
            <p>You have a {{count(Auth::user()->messages)}} messages from admin</p>

        @endif
        @foreach(Auth::user()->messages as $message)
            <div class="d-flex align-items-center flex-wrap">
            <button class="message" onclick="ShowModal('Mymodal-<?= $message["id"]?>')" style="margin-top:20px;background: #c1843d">{{$message->sender->name}}</button>
            </div>
    <div class="modal fade modal-div" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content delete-content" style="height: auto !important;">
                    <div class="modal-header d-block">
                        <button type="button" class="close closing" data-dismiss="modal">×</button>
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('images/logo.png')}}" width="120px" height="87px">
                        </div>
                    </div>
                    <div class="modal-body user-name">
                        {{$message->sender->name}}
                    </div>
                    <form action="{{route('sendMessage')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"  name="to_id" value="{{$message->sender->id}}">
                        <input type="hidden"  name="product" value="{{$message->product_id}}">
                        @if(!Auth::user()->hasRole('Admin'))
                            <div class="d-flex justify-content-center">
                            <input type="file" name="images[]" multiple>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <textarea class="product-message" name="message" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Send</button>
                            <button type="button" class="btn btn-default closing"  data-dismiss="modal">Close</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


        <div class="modal fade modal-div-send" id="Mymodal-<?= $message["id"]; ?>">
            <div class="modal-dialog">
                <div class="modal-content delete-content">
                    <div class="modal-header d-block">
                        <button type="button" class="closing-send close" data-dismiss="modal">×</button>
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('images/logo.png')}}" width="120px" height="87px">
                        </div>
                    </div>
                    <div class="modal-body user-name">
                        {{$message->sender->name}}
                    </div>
                    <div class="d-flex justify-content-center flex-wrap">
                        <textarea class="product-message" readonly>
                            {{$message->message}}
                        </textarea>
                    @if(Auth::user()->hasRole('Admin'))
                        @if($message->image)
                        <img class="myImg-send" src="{{ asset(  '/uploads/products/' . $message->image )}}" width="100" height="100">
                            @endif
                    @endif
                    </div>
                    <div id="myMod" class="modal myMod">
                        <button class="close closeMod" data-dismiss="modal">&times;</button>
                        <img class="modal-content openedImg" id="img02" data-id="">
                        <div id="caption1" class="caption1"></div>
                    </div>
                    <div class="d-flex justify-content-center">
                    @if(!Auth::user()->hasRole('Admin'))
                        <a href="{{route('privacy')}}">Privacy</a>
                    @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closing-send" data-dismiss="modal">Close</button>
                        <button class="btn-danger del-img1">Send message to {{$message->sender->name}}</button>
                    </div>


                </div>
            </div>

        </div>
        @endforeach
    @endif
@endsection
