@extends('frontend.layouts.layout')

@section('title')
   رحلة الاستقدام
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>


{{--        <div class="banner">--}}
{{--            <h1>   رحلةالاستقدام </h1>--}}
{{--            <ul>--}}
{{--                <li> <a href="{{route('home')}}">{{__('frontend.Home')}} </a> </li>--}}
{{--                <li> <a href="#!" class="active">  رحلةالاستقدام </a> </li>--}}
{{--            </ul>--}}
{{--        </div>--}}



        <!-- ================ recruitmentContract contract ================= -->
        <section class="recruitmentContract mt-0">
            <div class="container">
                <h1 class="" data-aos=" fade-up"> {{$recruitmentTrip->recruitment_trip_title}} </h1>
                <h4 class="" data-aos=" fade-up">
            {{$recruitmentTrip->recruitment_trip_desc}}
                </h4>
            </div>
        </section>
        <!-- ================ /recruitmentContract contract ================= -->

        <!-- ============= end steps =============  -->
        <section class="statistics mt-5">
            <div class="container">
                <!-- Section Title -->
                <div class="SectionTitle">
                    <h1 class="title" data-aos="fade-up"> الاحصائيات </h1>
                    <h6 class="hint" data-aos="fade-up"> اليك بعض احصائيات العملاء الذين تشرفنا بالعمل معهم </h6>
                </div>
                <div class="row mt-5">
                    <div class="col-6 col-md-3 p-2">
                        <div class="specifications">
                            <i class="fa-duotone fa-users"></i>
                            <div class="info">
                                <h1 class="odometer" data-count="794">00</h1>
                                <h6> عمالائنا </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-2">
                        <div class="specifications">
                            <i class="fa-duotone fa-buildings"></i>
                            <div class="info">
                                <h1 class="odometer" data-count="812">00</h1>
                                <h6> زوارنا </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-2">
                        <div class="specifications">
                            <i class="fa-duotone fa-user-headset"></i>
                            <div class="info">
                                <h1 class="odometer" data-count="793">00</h1>
                                <h6> خدمة العملاء </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-2">
                        <div class="specifications">
                            <i class="fa-duotone fa-briefcase"></i>
                            <div class="info">
                                <h1 class="odometer" data-count="710">00</h1>
                                <h6> عامل وعاملة </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ /arrive Worker ================= -->
        <div class="arriveWorker">
            <div class="container">
                <!-- arrive Worker Info -->
                <div class="arriveWorkerInfo">
                    <div class="image " data-aos=" fade-up">
                        <img src="{{asset('frontend')}}/img/recruitment-contract.webp">
                    </div>
                    <div class="info " data-aos=" fade-up">
                        <p>
                         {{$recruitmentTrip->recruitment_contract_desc}}
                        <div>
                            <a href="{{route('all-workers')}}" class="animatedLink">
                                أبدا الاستقدام
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="arriveWorker">
            <div class="container">
                <!-- arrive Worker Info -->
                <div class="arriveWorkerInfo">
                    <div class="image " data-aos=" fade-up">
                        <img src="{{asset('frontend')}}/img/arrive.webp">
                    </div>
                    <div class="info " data-aos=" fade-up">
                        <h3>{{$recruitmentTrip->employment_arrival_title??''}} </h3>
                        <p>
                          {{$recruitmentTrip->employment_arrival_desc??''}}
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
                        <h3> {{$recruitmentTrip->customers_service_title??''}} </h3>
                        <p>
              {{$recruitmentTrip->customers_service_desc??''}}

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
                                <img src="img/Ministry-of-Interior-01.svg" alt="">
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
