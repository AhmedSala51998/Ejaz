
{{--==============--}}
<header>
    <section class="inner">
        <!-- brand -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('frontend/img/logo.png')}}" loading="lazy" alt="">
        </a>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav">
                <li><a class="navLink active" href="{{route('home')}}"> {{__('frontend.Home')}} </a></li>
                <li><a class="navLink" href="{{checkRouteIsHome('#popular_service')}}" id="toggleCategories"> خدماتنا </a>
                    <div class="dropdownMenu categoriesList">
                        <ul>
                            <li>
                                <a  href="{{route('all-workers')}}"> طلب استقدام </a>
                            </li>
                            <li>
                                <a  href="{{trans('transferService')}}"> طلب نقل خدمات</a>
                            </li>
                            <li>
                                <a  href="{{trans('rental')}}">طلب تأجير</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="navLink" href="#"> من نحن  </a></li>
                <li><a class="navLink" href="{{route('frontend.show.countries')}}"> دول الاستقدام </a></li>

                <li><a class="navLink" href="{{route('frontend.show.ourStaff')}}"> خدمة العملاء </a></li>

                <li><a class="navLink" href="{{route('track_order_view')}}"> تتبع طلبك</a></li>
                <li><a class="navLink" href="{{route('frontend.supports.contactUs')}}"> تواصل معنا</a></li>

               @auth()

                    <li><a class="navLink" href="#" id="toggleCategories"> حسابي </a>
                        <div class="dropdownMenu categoriesList">
                            <ul>
                                <li>
                                    <a  href="{{route('auth.profile')}}"> طلبات الاستقدام </a>
                                </li>
                                <li>
                                    <a  href="{{route('auth.profile')}}"> الاشعارات</a>
                                </li>
                                <li>
                                    <a  href="{{route('auth.logout')}}"> {{__('frontend.Logout')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth
                @guest
                <li><a class="navLink" href="{{route('auth.login')}}">تسجيل الدخول</a></li>
                @endguest
            </ul>
        </nav>
        <!-- Actions -->
        <div class="moreActions">
{{--            <a href="#!"> عربي <i class="fa-sharp fa-light fa-language"></i></a>--}}
            <a href="{{route('all-workers')}}" class="animatedLink">
                طلب استقدام
{{--                <i class="fa-regular fa-arrow-alt-up ms-2"><span></span></i>--}}
                <i class="fa-regular fa-arrow-up-left ms-2"><span></span></i>
            </a>

        </div>
    </section>
</header>
