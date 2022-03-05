@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="float: right;">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}

@endsection
