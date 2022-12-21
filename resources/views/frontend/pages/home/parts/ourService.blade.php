@if (count($ourServices)>0)

    <section class="services" id="services">
        <div class="container">
            <!--  section Top -->
            <div class="sectionTop">
                <!-- Section Title -->
                <div class="SectionTitle text-md-start">
                    <h1 class="title" data-aos="fade-up"> خدمات الاستقدام </h1>
                    <h6 class="hint" data-aos="fade-up"> تعرف علي الخدمات التي نقدمها للمجتمع ... </h6>
                </div>
                <!-- siper conrtol -->
                <div class="swiperBtns" data-aos="fade-up">
                    <div class="servicesSliderPrev swiper-button-prev"></div>
                    <div class="servicesSlidePagination swiper-pagination"></div>
                    <div class="servicesSliderNext swiper-button-next"></div>
                </div>
            </div>
            <!-- slider -->
            <div class="swiper servicesSlider">
                <div class="swiper-wrapper">

                    <!-- slide -->
                    @foreach($ourServices as $service)

                    <div class="swiper-slide">
                        <div class="flipCard" data-aos="zoom-in-up">
                            <div class="cardFront"
                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{get_file($service->image)}});">
                                <div class="content">
                                    <h3>{{$service->title}} </h3>
                                    <a href="#!" class="animatedLink">
                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cardBack">
                                <div class="content">
                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">
                                    <h3>{{$service->title}} </h3>
                                    <p>
                                  {{$service->desc}}
                                    </p>
                                    <!-- <a href="#!" class="animatedLink">
                                      التفاصيل
                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@else

    <section class="services" id="services" >
        <div class="container">
            <!--  section Top -->
            <div class="sectionTop">
                <!-- Section Title -->
                <div class="SectionTitle text-md-start">
                    <h1 class="title" data-aos="fade-up"> خدمات الاستقدام </h1>
                    <h6 class="hint" data-aos="fade-up"> تعرف علي الخدمات التي نقدمها للمجتمع ... </h6>
                </div>
                <!-- siper conrtol -->
                <div class="swiperBtns" data-aos="fade-up">
                    <div class="servicesSliderPrev swiper-button-prev"></div>
                    <div class="servicesSlidePagination swiper-pagination"></div>
                    <div class="servicesSliderNext swiper-button-next"></div>
                </div>
            </div>
            <!-- slider -->
            <div class="swiper servicesSlider">
                <div class="swiper-wrapper">
                    <!-- slide -->
                    <div class="swiper-slide">
                        <div class="flipCard" data-aos="zoom-in-up">
                            <div class="cardFront"
                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service1.webp);">
                                <div class="content">
                                    <h3> إصدار التأشيرة </h3>
                                    <a href="#!" class="animatedLink">
                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cardBack">
                                <div class="content">
                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">
                                    <h3> إصدار التأشيرة </h3>
                                    <p>
                                        طلب اصدار تاشيرة العمالة المنزلية الخاصة بك في برنامج مساند
                                    </p>
                                    <!-- <a href="#!" class="animatedLink">
                                      التفاصيل
                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slide -->
                    <div class="swiper-slide">
                        <div class="flipCard" data-aos="zoom-in-up">
                            <div class="cardFront"
                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service2.webp);">
                                <div class="content">
                                    <h3> اختيار العمالة </h3>
                                    <a href="#!" class="animatedLink">
                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cardBack">
                                <div class="content">
                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">
                                    <h3> اختيار العمالة </h3>
                                    <p>
                                        اختيار السيره الذاتيه للعمالة المنزلية عبر البحث في
                                        برنامج مساند
                                    </p>
                                    <!-- <a href="#!" class="animatedLink">
                                      التفاصيل
                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slide -->
                    <div class="swiper-slide">
                        <div class="flipCard" data-aos="zoom-in-up">
                            <div class="cardFront"
                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service4.webp);">
                                <div class="content">
                                    <h3> تعاقد الاستقدام </h3>
                                    <a href="#!" class="animatedLink">
                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cardBack">
                                <div class="content">
                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">
                                    <h3> تعاقد الاستقدام </h3>
                                    <p>دفع رسوم الاستقدام عبر التعاقد في برنامج مساند</p>
                                    <!-- <a href="#!" class="animatedLink">
                                      التفاصيل
                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slide -->
                    <div class="swiper-slide">
                        <div class="flipCard" data-aos="zoom-in-up">
                            <div class="cardFront"
                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service3.webp);">
                                <div class="content">
                                    <h3> وصول العمالة </h3>
                                    <a href="#!" class="animatedLink">
                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cardBack">
                                <div class="content">
                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">
                                    <h3> وصول العمالة </h3>
                                    <p>وصول العمالة المنزلية من المطار المحلي الى المكتب</p>
                                    <!-- <a href="#!" class="animatedLink">
                                      التفاصيل
                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- slide -->
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="flipCard" data-aos="zoom-in-up">--}}
{{--                            <div class="cardFront"--}}
{{--                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service5.webp);">--}}
{{--                                <div class="content">--}}
{{--                                    <h3> إصدار التأشيرة </h3>--}}
{{--                                    <a href="#!" class="animatedLink">--}}
{{--                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="cardBack">--}}
{{--                                <div class="content">--}}
{{--                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">--}}
{{--                                    <h3> إصدار التأشيرة </h3>--}}
{{--                                    <p>--}}
{{--                                        طلب اصدار تاشيرة العمالة المنزلية الخاصة بك في برنامج مساند--}}
{{--                                    </p>--}}
{{--                                    <!-- <a href="#!" class="animatedLink">--}}
{{--                                      التفاصيل--}}
{{--                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>--}}
{{--                                    </a> -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- slide -->--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="flipCard" data-aos="zoom-in-up">--}}
{{--                            <div class="cardFront"--}}
{{--                                 style="background: linear-gradient(to top, #000000a3, #0000001a), url({{asset('frontend')}}/img/service6.webp);">--}}
{{--                                <div class="content">--}}
{{--                                    <h3> طلب عماله مهنيه </h3>--}}
{{--                                    <a href="#!" class="animatedLink">--}}
{{--                                        <i class="fa-light fa-bullseye-arrow"><span></span></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="cardBack">--}}
{{--                                <div class="content">--}}
{{--                                    <img src="{{asset('frontend')}}/img/pattern.svg" alt="">--}}
{{--                                    <h3> طلب عماله مهنيه </h3>--}}
{{--                                    <p>--}}
{{--                                        اننا قادرون علي جلب افضل انواع العمالة المهنيه من الدول المختلفه وكافة فائت--}}
{{--                                        العمله من العمل الى--}}
{{--                                        الطبيب--}}
{{--                                    </p>--}}
{{--                                    <!-- <a href="#!" class="animatedLink">--}}
{{--                                      التفاصيل--}}
{{--                                      <i class="fa-regular fa-left-long ms-2"><span></span></i>--}}
{{--                                    </a> -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>


@endif


