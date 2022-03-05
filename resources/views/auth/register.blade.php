@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Lang::get('lang.REG') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ Lang::get('lang.YOUR_NAME')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ Lang::get('lang.EMAIL')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ Lang::get('lang.USER_PASS')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ Lang::get('lang.CONFIRM_PASS') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Default inline 1-->
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input value="4" checked type="radio" class="custom-control-input" id="role1" name="UserRole" required>
                                    <label class="custom-control-label" for="role1">User</label>
                                </div>

                                <!-- Default inline 2-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input value="2" type="radio" class="custom-control-input" id="role2" name="UserRole" required>
                                    <label class="custom-control-label" for="role2">Seller</label>
                                </div>

                                <!-- Default inline 3-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input value="3" type="radio" class="custom-control-input" id="role3" name="UserRole" required>
                                    <label class="custom-control-label" for="role3">Manufacturer</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="display: none" id="aboutTextDiv">
                            <div class="col-md-4 col-form-label text-md-right">
                                <label class=""  for="about-user">Info about you</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control textarea-autosize" placeholder="Name Surname, Company name, Tel." id="about-user" name="message" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ Lang::get('lang.REG')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
