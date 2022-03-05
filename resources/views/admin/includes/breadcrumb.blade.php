{{--<div class="content-header">--}}
{{--    <nav aria-label="breadcrumb">--}}
{{--        <ol class="breadcrumb breadcrumb-style-1">--}}
{{--            <li class="breadcrumb-item {{ $isDashboardPage = request()->routeIs('admin.dashboard') ? 'active' : '' }}">--}}
{{--                @if($isDashboardPage)--}}
{{--                    Dashboard--}}
{{--                @else--}}
{{--                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>--}}
{{--                @endif--}}
{{--            </li>--}}

{{--            @if(isset($breadcrumb))--}}
{{--                @foreach($breadcrumb as $n => $item)--}}
{{--                    <li class="breadcrumb-item{{ $n == count($breadcrumb) - 1 ? ' active' : '' }}" aria-current="page">--}}
{{--                        @if (isset($item['url']))--}}
{{--                            <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>--}}
{{--                        @else--}}
{{--                            {{ $item['name'] }}--}}
{{--                        @endif--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        </ol>--}}
{{--    </nav>--}}
{{--    @if (isset($pageTitle))--}}
{{--        <h1 class="page-title">{{ $pageTitle }}</h1>--}}
{{--    @endif--}}
{{--</div>--}}

@if ((!isset($showErrors) || (isset($showErrors) && $showErrors !== false)) && count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ((!isset($showSuccessMes) || (isset($showSuccessMes) && $showSuccessMes !== false)))
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endif
