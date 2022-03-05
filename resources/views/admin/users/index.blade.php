@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    <div class="row">
        <div class="col-lg-6 margin-tb">
            <input type="text" id="user-search" class="form-control" placeholder="Search all fields e.g. HTML">
        </div>
        <div class="col-lg-6 margin-tb">
            <div style="float: right;">
                <a class="btn btn-success" href="{{ route('users.create') }}"> {{ Lang::get('lang.ADD_USER') }}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="check-user" class="col-lg-12 m-2">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="Admin">Admin
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="User">User
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="Seller">Seller
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="Manufacturer">Manufacturer
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="Service">Service
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked value="Request">New Request
                </label>
            </div>
        </div>
    </div>

    <table id="check-user-role" class="table table-bordered">
        <tr>
            <th>No</th>
            <th>{{ Lang::get('lang.USER_NAME') }}</th>
            <th>{{ Lang::get('lang.EMAIL') }}</th>
            <th>Roles</th>
            <th width="320px">{{ Lang::get('lang.ACTION') }}</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if($user->roles->first()->id !== $user->role_id)
                    <td class="Request">
                        <label class="badge badge-warning ">{{ $roles[$user->role_id] }}</label>
                    </td>
                @else
                    <td class="{{ $user->roles->first()->name }}">
                        <label class="badge badge-success">{{ $user->roles->first()->name }}</label>
                    </td>
                @endif
        <td>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{  Lang::get('lang.EDIT') }}</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit(Lang::get('lang.DELETE'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a class="btn btn-default" href="{{ route('product.index',['user_id' =>$user->id]) }}">{{  Lang::get('lang.PRODUCTS') }}</a>

        </td>
</tr>
@endforeach
</table>


{{--{!! $data->render() !!}--}}
@endsection
