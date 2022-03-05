@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    @if(count($errors) > 0 )
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    {!! Form::model($info, ['method' => 'PATCH','route' => ['about.update', 1], 'enctype' => "multipart/form-data"]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{{ Lang::get('lang.PRODUCT_NAME') }}:</strong>
                {!! Form::text('title', null, array('placeholder' => Lang::get('lang.PRODUCT_NAME') ,'class' => 'form-control', 'required')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{{ Lang::get('lang.PHONE_OPERATOR') }}:</strong>
                {!! Form::text('phone', $info->phone, array('placeholder' => Lang::get('lang.PHONE_OPERATOR'),'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group mess-group">
                <strong>{{ Lang::get('lang.OPTIONAL_PHONE') }}:</strong>
                <div class="messenger d-flex justify-content-between align-items-center">
                    <div>
                        {!! Form::text('optional_phone', $info->optional_phone, array('placeholder' => 'viber, whatsapp, telegram','class' => 'form-control', 'required')) !!}
                    </div>
                    <div>
                        <input type="checkbox" @if(isset($info->messengers[0]) &&  in_array('0', $info->messengers)) checked @endif id="viber" name="messengers[viber]" value="0"> <label for="viber" class="fa-2x ml-2 mr-2" > <i style="color: PURPLE;" class="fab fa-viber"></i></label>
                        <input type="checkbox" @if(isset($info->messengers[0])  && in_array('1', $info->messengers)) checked @endif id="whatsapp" name="messengers[whatsapp]" value="1"> <label for="whatsapp" class="fa-2x ml-2 mr-2"> <i style="color: #25D366;" class="fab fa-whatsapp"></i></label>
                        <input type="checkbox" @if(isset($info->messengers[0])  && in_array('2', $info->messengers)) checked @endif id="telegram" name="messengers[telegram]" value="2"> <label for="telegram" class="fa-2x ml-2 mr-2"><i style="color: #269cd9;" class="fab fa-telegram"></i></label>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.MARKET') !!}:</strong>
                {!! Form::select('market', ['YEREVAN' => Lang::get('lang.YEREVAN'), 'ARAGATSOTN' => Lang::get('lang.ARAGATSOTN'), 'ARARAT' => Lang::get('lang.ARARAT'), 'ARMAVIR' => Lang::get('lang.ARMAVIR'), 'GEGHARKUNIK' => Lang::get('lang.GEGHARKUNIK')
                                                ,'KOTAYK' => Lang::get('lang.KOTAYK'), 'LORI' => Lang::get('lang.LORI'), 'SHIRAK' => Lang::get('lang.SHIRAK'), 'SYUNIK' => Lang::get('lang.SYUNIK'), 'TAVUSH' => Lang::get('lang.TAVUSH'), 'VAYOTS_DZOR' => Lang::get('lang.VAYOTS_DZOR')], $info->market , array('class' => 'form-control', 'id' => 'selectMarket')) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{{ Lang::get('lang.ADDRESS') }}:</strong>
                {!! Form::text('address', $info->address, array('placeholder' => Lang::get('lang.ADDRESS'),'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{{ Lang::get('lang.OPTIONAL_ADDRESS') }}:</strong>
                {!! Form::text('optional_address', $info->optional_address, array('placeholder' => Lang::get('lang.OPTIONAL_ADDRESS'),'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <strong>{{ Lang::get('lang.EMAIL') }}:</strong>
                {!! Form::text('email', $info->email, array('placeholder' => Lang::get('lang.EMAIL'),'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="img-group col-xs-12 col-sm-12 col-md-6  col-lg-3">
            <strong>Logo:</strong>
            <div class="form-group d-flex">
                <input type="file" id="img" name="pictures" accept="image/*" class="w-50">
                <img class="w-25" src="{{ asset('/uploads/profiles/' . $info->pictures )}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <strong>{{ Lang::get('lang.PRODUCT_TITLE') }}:</strong>
                {!! Form::textarea('description', $info->description, array('placeholder' => 'Name Surname, Company name, Tel.','class' => 'form-control', 'required')) !!}

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="submit" class="btn btn-primary">{{ Lang::get('lang.EDIT') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
