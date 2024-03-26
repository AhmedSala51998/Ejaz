@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.visa')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> وصول العمالة </h1>
            <ul>
                <li> <a href="{{route('home')}}">{{__('frontend.Home')}} </a> </li>
                <li> <a href="#!" class="active"> وصول العمالة </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->

        <!-- ================ /arrive Worker ================= -->
        <div class="arriveWorker">
            <div class="container">
                <!-- arrive Worker Info -->
                <div class="arriveWorkerInfo">
                    <div class="image " data-aos=" fade-up">
                        <img src="{{asset('frontend')}}/img/arrive.webp">
                    </div>
                    <div class="info " data-aos=" fade-up">
                        <h3> وصول العمالة </h3>
                        <p>
                            فريق العمل يضمن دائما وباستمرار تقديم خدمات سريعة ومتميزة في استقدام العمالة المنزلية المدربة داخل
                            المملكة العربية السعودية مع متابعة مستمرة للعامل أو العاملة من خلال إشعار العميل بوقت وصول العمالة الوافدة
                            بسرعة ودقة عالية، والتنسيق لاستقبال السائق الخاص أو الخادمة المنزلية واستلام كامل وثائق استقدام العمالة
                            المنزلية
                        </p>
                        <h5>عائلتك اسعد ,حياتك افضل </h5>
                    </div>
                </div>
                <!-- arrive Worker Info -->
                <div class="arriveWorkerInfo">
                    <div class="image " data-aos=" fade-up">
                        <img src="{{asset('frontend')}}/img/f1.webp">
                    </div>
                    <div class="info " data-aos=" fade-up">
                        <h3> خدمة العملاء </h3>
                        <p>
                            دائما ما نتبنى أحدث الأساليب والتقنيات للتعامل مع العملاء وضمان جودة عالية في الخدمات المقدمة في مكتب
                            ايجاز للاستقدام كما أننا نوفر جميع الأدوات لدراسة السوق لتطوير وتوفير خدمات ذات جودة عالية لاستقدام
                            العمالة المنزلية وللتواصل مع العملاء قبل وبعد وصول العمالة المنزلية , نلتزم بشكل تام لخدمة مختلف
                            الاحتياجات بمصداقية عالية وشفافية مطلقة حيث أننا نطمح لتجاوز توقعات عملائنا وبناء علاقة طويلة المدى مع
                            كافة العملاء لمعرفة كافة احتياجاتهم ومتطلباتهم.


                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================ references ================= -->
        <section class="references">
            <div class="container">
                <div class="swiper referencesSlider ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="referenceLogo ">
                                <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="referenceLogo ">
                                <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="referenceLogo ">
                                <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="referenceLogo ">
                                <img src="{{asset('frontend')}}/img/musand.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>



    </content>



@endsection
