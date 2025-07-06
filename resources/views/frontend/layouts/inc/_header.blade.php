
{{--==============--}}
<style>

    /* مخفية افتراضيًا */
    .categoriesList {
        display: none;
        transition: all 0.3s ease;
    }

    /* تظهر فقط عند وجود الكلاس show */
    .categoriesList.show {
        display: block;
    }

    /* السهم */
    .arrowIcon {
        width: 20px;
        height: 20px;
        margin: 0 8px;
        margin-right:-1px;
        vertical-align: middle;
        fill: black;
        transition: transform 0.3s ease, fill 0.3s ease;
    }

    .dropdownToggle:hover .arrowIcon,
    .dropdownToggle.active .arrowIcon {
        fill: white;
    }

    .dropdownToggle.active .arrowIcon {
        transform: rotate(180deg);
    }
    /* تعطيل أي ظهور للقائمة عند الـ hover */
    .dropdownWrapper .categoriesList {
        display: none !important;
    }

    /* السماح بعرضها فقط إذا كانت مفعّلة من JavaScript */
    .dropdownWrapper .categoriesList.force-show {
        display: block !important;
    }

    /* القائمة الجانبية */
    .mobile-sidebar {
        position: fixed;
        top: 0;
        right: -100%;
        width: 270px;
        height: 100%;
        background: #fff;
        box-shadow: -3px 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: right 0.3s ease;
        z-index: 9999;
        overflow-y: auto;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .mobile-sidebar.active {
        right: 0;
    }

    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .close-btn {
        font-size: 24px;
        background: none;
        border: none;
        color: #000;
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-nav li {
        margin-bottom: 15px;
    }

    .sidebar-nav li a {
        display: block;
        padding: 10px 15px;
        border-radius: 10px;
        background-color: #f7f7f7;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .sidebar-nav li a:hover {
        background-color: #f4a835;
        color: white;
    }

    /* الخلفية وراء القائمة */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.3);
        z-index: 9990;
        display: none;
    }

    .sidebar-overlay.active {
        display: block;
    }

      /* إظهار أو إخفاء حسب الشاشات */

    /* الكلاسات الأساسية */
    .d-none { display: none !important; }
    .d-block { display: block !important; }

    /* من الشاشات المتوسطة (≥ 992px) */
    @media (min-width: 992px) {
        .d-lg-block { display: block !important; }
        .d-lg-none { display: none !important; }
    }

    @media (max-width: 991.98px) {
        .d-lg-block { display: none !important; }
        .d-lg-none { display: block !important; }
    }

    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 10px; /* حسب الحاجة */
    }

    /* توسيط الشعار وتحجيمه */
  .sidebar-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 25px 15px;
    position: relative
    }

    .logo-link {
    display: inline-block;
    transition: transform 0.4s ease;
    }

    .logo-img {
    max-height: 80px;
    transition: transform 0.6s ease, filter 0.6s ease;
    filter: drop-shadow(0 0 8px rgba(255, 153, 0, 0.3));
    }

    /* تأثير hover على اللوجو */
    .logo-link:hover .logo-img {
    transform: scale(1.08) rotate(1deg);
    filter: drop-shadow(0 0 12px rgba(255, 153, 0, 0.6));
    }

    /* زر الإغلاق يظل في الزاوية */
    .close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    background: none;
    border: none;
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
    }
    .close-btn:hover {
    color: #d97706;
    }

    /* أنيميشن عند الظهور */
    .animate-logo {
    animation: zoomFade 1s ease forwards;
    opacity: 0;
    }

    @keyframes zoomFade {
    0% {
        opacity: 0;
        transform: scale(0.5) translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
    }
    header .navbar {
        background: rgba(244, 168, 53, 0.20) !important;
        border:1px solid rgba(244, 168, 53, 0.20) !important;
        background: linear-gradient(135deg, #f4a835, #fff1db) !important;
    }

    #mobileSidebar .sidebar-nav a.active {
        background-color: #f4a835;
        color: white;
    }

    .navbar a.active,
    .navbar a:hover {
        background-color: #f4a835 !important;
        color: white !important;
        border-radius: 999px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15), 0 0 0 3px rgba(244, 168, 53, 0.5);
        position: relative;
        z-index: 10;
        transition: all 0.3s ease-in-out;
    }


</style>
<header>
    <section class="inner">
        <!-- brand -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('frontend/img/logo.png')}}" loading="lazy" alt="">
        </a>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <button id="mobileMenuToggle" class="mobile-toggler d-lg-none" style="background: none; border: none;">
                <svg width="28" height="28" fill="#333" viewBox="0 0 24 24">
                    <path d="M3 6h18M3 12h18M3 18h18" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
            <ul class="navbar-nav">
                <li><a class="navLink active" href="{{route('home')}}"> {{__('frontend.Home')}} </a></li>
                <li class="dropdownWrapper">
                    <a class="navLink dropdownToggle" href="javascript:void(0);" id="toggleCategories">
                        خدماتنا
                        <svg class="arrowIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5z"/>
                        </svg>
                    </a>
                    <div class="dropdownMenu categoriesList" style="box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07) !important;border-radius: 16px !important;background: white !important;" id="categoriesMenu">
                        <ul>
                            <li><a href="{{ route('all-workers') }}">طلب استقدام</a></li>
                            <li><a href="{{ route('transferService') }}">طلب نقل خدمات</a></li>
                            <li><a href="{{ route('rental') }}">طلب تأجير</a></li>
                        </ul>
                    </div>
                </li>
                <li><a class="navLink" href="{{route('frontend.aboutUs')}}"> من نحن  </a></li>
                <li><a class="navLink" href="{{route('frontend.show.countries')}}"> دول الاستقدام </a></li>

                <li><a class="navLink" href="{{route('frontend.show.ourStaff')}}"> خدمة العملاء </a></li>

                <li><a class="navLink" href="{{route('track_order_view')}}"> تتبع طلبك</a></li>
                <li><a class="navLink" href="{{route('frontend.supports.contactUs')}}"> تواصل معنا</a></li>

               @auth()

                    <li class="d-none d-lg-block"><a class="navLink" href="#" id="toggleCategories"> حسابي </a>
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
                <li class="d-none d-lg-block"><a class="navLink" href="{{route('auth.login')}}">تسجيل الدخول</a></li>
                @endguest
            </ul>
        </nav>
        <!-- Actions -->
        <div class="moreActions d-none d-lg-block">
{{--            <a href="#!"> عربي <i class="fa-sharp fa-light fa-language"></i></a>--}}
            <a href="{{route('all-workers')}}" class="animatedLink">
                طلب استقدام
{{--                <i class="fa-regular fa-arrow-alt-up ms-2"><span></span></i>--}}
                <i class="fa-regular fa-arrow-up-left ms-2"><span></span></i>
            </a>

        </div>
    </section>
</header>
<div id="mobileSidebar" class="mobile-sidebar">
    <div class="sidebar-header text-center">
        <a href="{{ route('home') }}" class="logo-link animate-logo">
            <img src="{{ asset('frontend/img/logo.png') }}" class="img-fluid logo-img" alt="شعار">
        </a>
        <button id="closeSidebar" class="close-btn">&times;</button>
    </div>
    <ul class="sidebar-nav">
        <li><a href="{{route('home')}}">الرئيسية</a></li>
        <li><a href="{{ route('all-workers') }}">طلب استقدام</a></li>
        <li><a href="{{ trans('transferService') }}">طلب نقل خدمات</a></li>
        <li><a href="{{ trans('rental') }}">طلب تأجير</a></li>
        <li><a href="{{route('frontend.aboutUs')}}">من نحن</a></li>
        <li><a href="{{route('frontend.show.countries')}}">دول الاستقدام</a></li>
        <li><a href="{{route('frontend.show.ourStaff')}}">خدمة العملاء</a></li>
        <li><a href="{{route('track_order_view')}}">تتبع الطلب</a></li>
        <li><a href="{{route('frontend.supports.contactUs')}}">تواصل معنا</a></li>
        @auth()

            <li class="d-block d-lg-none"><a class="navLink" href="#" id="toggleCategories"> حسابي </a>
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
        <li class="d-block d-lg-none"><a class="navLink" href="{{route('auth.login')}}">تسجيل الدخول</a></li>
        @endguest
    </ul>
</div>
<div id="sidebarOverlay" class="sidebar-overlay"></div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById('toggleCategories');
        const dropdown = document.getElementById('categoriesMenu');

        toggleBtn.addEventListener('click', function (e) {
            e.preventDefault();

            const isOpen = dropdown.classList.contains('force-show');

            if (isOpen) {
                dropdown.classList.remove('force-show');
                toggleBtn.classList.remove('active');
            } else {
                dropdown.classList.add('force-show');
                toggleBtn.classList.add('active');
            }
        });
    });
    
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("mobileMenuToggle");
        const sidebar = document.getElementById("mobileSidebar");
        const closeBtn = document.getElementById("closeSidebar");
        const overlay = document.getElementById("sidebarOverlay");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.add("active");
            overlay.classList.add("active");
        });

        closeBtn.addEventListener("click", function () {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });

        overlay.addEventListener("click", function () {
            sidebar.classList.remove("active");
            this.classList.remove("active");
        });
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const currentUrl = window.location.href.split(/[?#]/)[0];

    const desktopLinks = document.querySelectorAll(".navbar-nav .navLink");
    const mobileLinks  = document.querySelectorAll("#mobileSidebar .sidebar-nav a");

    [...desktopLinks, ...mobileLinks].forEach(link => {
        const linkPath = new URL(link.href).pathname;
        const currentPath = new URL(currentUrl).pathname;

        if (linkPath === currentPath) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });

    // دعم "خدماتنا" (ديسكتوب)
    const dropdownWrapper = document.querySelector(".dropdownWrapper");
    const dropdownToggle = dropdownWrapper.querySelector(".dropdownToggle");
    const dropdownMenu = dropdownWrapper.querySelector(".categoriesList");
    const dropdownLinks = dropdownWrapper.querySelectorAll(".categoriesList a");

    dropdownLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        const currentPath = new URL(currentUrl).pathname;

        if (linkPath === currentPath) {
            dropdownToggle.classList.add("active");
            dropdownMenu.classList.add("force-show");
        }
    });

    // دعم "خدماتنا" (موبايل)
    const mobileDropdownToggle = document.querySelector("#mobileSidebar .navLink#toggleCategories");
    const mobileDropdownMenu = document.querySelector("#mobileSidebar .categoriesList");
    const mobileDropdownLinks = mobileDropdownMenu ? mobileDropdownMenu.querySelectorAll("a") : [];

    mobileDropdownLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        const currentPath = new URL(currentUrl).pathname;

        if (linkPath === currentPath) {
            if (mobileDropdownToggle) {
                mobileDropdownToggle.classList.add("active");
            }
            if (mobileDropdownMenu) {
                mobileDropdownMenu.classList.add("force-show");
            }
        }
    });
});

</script>


