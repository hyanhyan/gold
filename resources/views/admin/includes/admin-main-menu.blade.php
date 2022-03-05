<div class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="logo-box">@if (Auth::user()->hasRole('User'))
                User Panel @elseif(Auth::user()->hasRole('Seller')) Seller panel @elseif(Auth::user()->hasRole('Admin'))
                Admin Panel @else Manufacturer @endif</a>

    <div class="admin-sidebar-items">
        <ul class="accordion-menu">
            <div class="logo active-page">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{asset('images/logo.png')}}" alt="admin logo">
                </a>
            </div>
                <h2>Dashboard</h2>
            </li>
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('rate.index') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.RATE') }}
                    </a>
                </li>
            @endif
            <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon icon-person"></i><span>User Control</span><i
                        class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul class="sub-menu">

                    @if (Auth::user()->hasRole('Admin'))
                        <li><a href="{{ route('users.index') }}">{{ Lang::get('lang.USERS') }}</a></li>
                        <li><a href="{{ route('admin.about') }}">Profile</a></li>
                        {{--                        <li><a href="{{ route('roles.index') }}">Roles & Permissions</a></li>--}}
                    @endif
                    <li><a href="{{ route('admin.change-password') }}">Change Password</a></li>
                </ul>
                <ul class="sub-menu">

                    @if (Auth::user()->hasRole('Seller') || Auth::user()->hasRole('Manufacturer'))
                        <li><a href="{{ route('users.index') }}">{{ Lang::get('lang.USERS') }}</a></li>
                        <li><a href="{{ route('admin.about') }}">My account</a></li>
                        {{--                        <li><a href="{{ route('roles.index') }}">Roles & Permissions</a></li>--}}
                    @endif
                    <li><a href="{{ route('admin.change-password') }}">Change Password</a></li>
                </ul>
            </li>
            @if (Auth::user()->hasRole('User'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.PURCHASE_HISTORY') }}
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasRole('User'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.ADDRESS') }}
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('User'))
                <li>
                    <a>
                        <i class="menu-icon icon-poll"></i><span>{{ Lang::get('lang.PAYMENT-INFO') }}</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.USERS') }}
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.ACTIVE_USERS') }}
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('admin.about_us') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.ABOUT_US') }}
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('admin.privacy') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.PRIVACY & POLICY') }}
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('admin.collection') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.COLLECTION') }}
                    </a>
                </li>
            @endif
            @if (!Auth::user()->hasRole('User') && Auth::user()->hasRole('Admin') )
                <li>
                    <a href="{{ route('product.index') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.PICTURES') }}
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('product.index') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.PRODUCT') }}
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('active') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.ACTIVE') }}
                    </a>
                </li>
            @endif
            @if (!Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('view_offer') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.OFFERS') }}
                    </a>
                </li>
            @endif
            @if (!Auth::user()->hasRole('User'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.SOLD') }}
                </li>
            @endif
            @if (!Auth::user()->hasRole('User'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.FAKE') }}
                    </a>
                </li>
            @endif
            @if (!Auth::user()->hasRole('User'))
                <li>
                    <a class="d-flex" href="{{route('message')}}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.MESSAGE') }}
                        @if(!Auth::user()->hasRole('User'))
                            <div style="margin-left:10px;border-radius:50%;width:28px;height: 32px;border: 1px solid red;text-align: center;color:red">{{count(Auth::user()->messages)}}
                            </div>
                        @endif
                    </a>

                </li>
            @endif
            @if (!Auth::user()->hasRole('User') && !Auth::user()->hasRole('Admin'))
                <li>
                    <a>
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.TOOLS') }}
                    </a>
                </li>
            @endif
            {{--            <li>--}}
            {{--                <a href="{{ route('pictures') }}">--}}
            {{--                    <i class="menu-icon icon-shopping_cart"></i><span>{{ Lang::get('lang.PICTURES') }}</span>--}}
            {{--                </a>--}}

            {{--            <li>--}}


            @if (Auth::user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('service.index') }}">
                        <img src="{{asset('images/admin_img.png')}}" alt="admin logo">
                        {{ Lang::get('lang.SERVICE') }}
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); $('#form-logout').submit();">
                    <i class="menu-icon icon-home4"></i>
                    <form id="form-logout" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
                    {{ Lang::get('lang.LOG_OUT') }}
                </a>
            </li>
        </ul>
    </div>
</div>
{{--</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
