@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ Lang::get('lang.USER_NAME') }}:</strong>
                {!! Form::text('name', null, array('placeholder' => Lang::get('lang.USER_NAME') ,'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ Lang::get('lang.EMAIL') }}:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ Lang::get('lang.USER_PASS') }}:</strong>
                {!! Form::password('password', array('placeholder' =>  Lang::get('lang.USER_PASS') ,'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ Lang::get('lang.CONFIRM_PASS') }}:</strong>
                {!! Form::password('confirm-password', array('placeholder' => Lang::get('lang.CONFIRM_PASS') ,'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>about customer{{ Lang::get('lang.USER_NAME') }}:</strong>
                {!! Form::textarea('message', null, array('placeholder' => 'Name Surname, Company name, Tel.','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role: </strong>
                @if($user->roles->first()->id !== $user->role_id)
                    <strong class="badge-warning p-1">
                            Want to be {{$roles[$user->role_id]}}
                    </strong>
                @endif
                @php
                    $isDis = '';
                  if(1 === $user->id){
                      $isDis = 'disabled';
                  }

                @endphp
                {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control', $isDis ) ) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{ Lang::get('lang.EDIT') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
