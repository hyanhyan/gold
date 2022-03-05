@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    <div class="col-md-8" style="margin: 20px;">
        {{ Form::open(['action' => 'Admin\\AdminController@changePassword']) }}
        <div class="form-group has-feedback">
            {!! Form::label('old_password', 'Old password:', ['class' => 'control-label']) !!}
            {!! Form::password('old_password', ['id' => 'old_password', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('password', 'New password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group has-feedback">
            {{ Form::submit('Change', ['class' => 'btn btn-primary btn-block btn-flat']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection