<header>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{$settings->header_logo?get_file($settings->header_logo):asset('frontend/img/logo.svg')}}" />
            </a>
            <!-- links in md media -->
            <div class="d-none d-lg-block">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            خدماتنا
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('all-workers')}}"> طلب استقدام </a>

                            </li>
                            <li>

                                <a class="dropdown-item" href="{{trans('transferService')}}"> طلب نقل خدمات</a>

                            </li>
                        </ul>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            رحلة الاستقدام
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('frontend.recruitmentContract')}}"> تعاقد الاستقدام </a>

                            </li>
                            <li>

                                <a class="dropdown-item" href="{{route('frontend.visa')}}">اصدار التاشيرة</a>

                            </li>
                        </ul>
                    </li>






                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            عن الاستقدام
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('frontend.recruitmentPolicy')}}"> سياسات الاستقدام </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('frontend.musaned')}}"> مبادرة مساند </a>
                            </li>

                        </ul>
                    </li>




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            الدعم
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('frontend.supports')}}"> الدعم </a>

                            </li>
                            <li>

                                <a class="dropdown-item" href="{{route('frontend.supports.contactUs')}}">تواصل معنا</a>

                            </li>
                        </ul>
                    </li>







                    @auth

                    <!-- If the user is logged in -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <p> حسابي </p>
                        </a>
                        <ul class="dropdown-menu text-start" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="{{route('auth.profile')}}"> طلبات
                                    الاستقدام </a></li>
                            <li><a class="dropdown-item" href="{{route('auth.profile')}}">
                                    الاشعارات </a></li>

                            @if(\Illuminate\Support\Facades\Auth::user())

                                <li><a class="dropdown-item" href="{{route('auth.logout')}}">
                                        {{__('frontend.Logout')}} </a></li>



                            @else

                                <li><a class="dropdown-item" href="{{route('auth.login')}}">
                                        {{__('frontend.Login')}} </a></li>



                            @endif
                        </ul>
                    </li>
                    @endauth
                    <!-- If the user is not logged in  -->




                    @if(\Illuminate\Support\Facades\Auth::user())


{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('auth.logout')}}" class="animatedLink">--}}
{{--                                {{__('frontend.Logout')}}--}}
{{--                                <i class="fa-regular fa-left-long ms-2"><span></span></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                    @else

                        <li class="nav-item">
                            <a href="{{route('auth.login')}}" class="animatedLink">
                                {{__('frontend.Login')}}
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </li>


                    @endif





                </ul>
            </div>
            <!-- toggle btn -->
            <div class="sideBtn d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- side menu -->
            <div class="sideMenu">
                <div class="sideMenuInner">
                    <a class="sideMenuLink" href="{{route('home')}}"> الرئيسية </a>

                    <div class=" sideMenuLink dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            خدماتنا
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('all-workers')}}"> طلب استقدام </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{trans('transferService')}}"> طلب نقل خدمات</a>
                            </li>
                        </ul>
                    </div>


                    <a class="sideMenuLink" href="{{route('frontend.recruitmentContract')}}"> رحلة الاستقدام </a>



                    <div class=" sideMenuLink dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            عن الاستقدام
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('frontend.recruitmentPolicy')}}"> سياسات الاستقدام </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href=""> مبادرة مساند </a>
                            </li>

                        </ul>
                    </div>

                    <a class="sideMenuLink" href="{{route('frontend.supports')}}"> الدعم</a>


                    </li>
                    <!-- If the user is logged in -->
                    @auth()
                    <div class=" sideMenuLink dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <p> حسابي </p>
                        </a>
                        <ul class="dropdown-menu text-start" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('auth.profile')}}"> طلبات
                                    الاستقدام </a></li>
                            <li><a class="dropdown-item" href="{{route('auth.profile')}}">
                                    الاشعارات </a></li>
                            <li><a class="dropdown-item" href="{{route('auth.logout')}}">
                                    تسجيل الخروج </a></li>
                        </ul>
                    </div>
                    @endauth
                    <!-- If the user is not logged in  -->
                    @guest()
                    <div class=" sideMenuLink">
                        <a href="{{route('auth.login')}}" class="animatedLink">
                            تسجيل الدخول
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <script>
        // side menu
        $(".sideBtn").click(function () {
            $(this).toggleClass("active");
            $(".sideMenu").toggleClass("active");
        });
    </script>





</header>
