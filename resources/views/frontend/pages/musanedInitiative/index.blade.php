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

        <!-- ================ recruitmentContract contract ================= -->
        <section class="recruitmentContract">
            <div class="container">
                <h1 class="" data-aos=" fade-up"> تعاقد الإستقدام </h1>
                <h4 class="" data-aos=" fade-up">
                    يتكون فريق العمل من أفضل المتخصصين في مجالات استقدام العمالة المنزلية للافراد بخبرة كبيرة في توظيف الكوادر
                    البشرية وخدمات الاستقدام بالتعاون مع مجموعة كبيرة من خبراء الاستقدام ومن خلال شبكة من الوكالات الدولية ومكاتب
                    الاستقدام الاقليمية والعالمية وبمعرفة شاملة بكل ما يخص تعاقد الاستقدام للعمل المنزلي والالتزام بجميع قوانين
                    وتشريعات وزارة العمل للارتقاء بأعلى مستويات الجودة في الخدمة المقدمة لعملائنا وتغطية احتياجات المواطن السعودي
                    وكذلك المقيم وفق أعلى المعايير الوطنية لجميع المدن في المملكة العربية السعودية.

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
                            كل ما عليك القيام به هو اختيار العمالة المنزلية التي تحتاج إليها لنقوم بمطابقة المواصفات المطلوبة واختيار
                            عمالة يمكن الاعتماد عليها بعد الاتفاق على الشروط والأحكام وقيمة الراتب المدفوع بين صاحب العمل والعمالة
                            المنزلية , بعد ذلك يقوم العميل بدفع مبلغ الرسوم لتقديم طلب الاستقدام لتوظيف العامل المنزلي المطلوب
                            والتنسيق مع وكالة الاستقدام الأجنبية في البلد المعني ونقوم بتحديث الحالة لطلب الاستقدام

                        <div>
                            <a href="#!" class="animatedLink">
                                أبدا الاستقدام
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
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
