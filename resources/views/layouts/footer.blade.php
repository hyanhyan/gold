
<footer>

    <div class="footer-inner">

        <div class="container">

            <div class="footerNav">

                <ul class="dFlex align-center justify-between flex-wrap">

                    <li>

                        <a href="{{route('contact')}}">Contact Us</a>

                    </li>

                    <li>

                        <a href="{{route('sponsors')}}">{{ Lang::get('lang.SPONSORS')  }}</a>

                    </li>

                    <li>

                        <a href="{{route('admin.privacy')}}">Privacy policy</a>

                    </li>

                    <li>

                    <a href="{{route('fakes')}}">{{ Lang::get('lang.FAKE_JEWELRY')}}</a>

                    </li>

                    <li>

                        <a href="{{route('about')}}">{{ Lang::get('lang.ABOUT_US')  }}</a>

                    </li>

                </ul>

            </div>

            <div class="footerIcon dFlex align-center justify-center">

                <div class="dFlex justify-center align-center">

                    <a href="#">

                        <img src="{{ asset('images/facebook.png')}}">

                    </a>

                    <a href="#">

                        <img src="{{ asset('images/instagram.png')}}">

                    </a>

                </div>

            </div>

        </div>

    </div>
{{--    <script>(function(d,s){d.getElementById("licntF3B2").src="https://counter.yadro.ru/hit?t26.6;r"+escape(d.referrer)+--}}
{{--            ((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"*"+--}}
{{--                (s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+--}}
{{--            ";h"+escape(d.title.substring(0,150))+";"+Math.random()})--}}
{{--        (document,screen)</script>--}}
</footer>
