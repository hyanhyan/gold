@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
<div class="admin-page-content">
    <div class="row">
        <h1>Hello, {{ auth()->user()->name }}!</h1>
    </div>
{{--    @if(!Auth::user()->hasRole('Admin'))--}}
{{--        @include('cominghome')--}}
{{--        @endif--}}
    <div class="row">
        <section>
            @foreach($user as $attribute => $value)
                <p>{{ $attribute . ' : ' . $value }}</p>
            @endforeach
        </section>
    </div>
</div>
@endsection
