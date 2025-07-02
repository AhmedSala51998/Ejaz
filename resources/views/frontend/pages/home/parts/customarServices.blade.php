<style>
.section-title {
    font-size: 2.8rem;
    color: #5F5F5F;
    font-weight: bold;
}

.section-subtitle {
    color: #A7A7A7;
    font-size: 1.1rem;
}

.customer-service-section {
    background: linear-gradient(135deg, #F2B544, #ffffff);
    background-size: 200% 200%;
    animation: bg-move 10s ease infinite;
}

@keyframes bg-move {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.service-card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 5px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    transition: all 0.4s ease;
    text-align: center;
    padding: 30px 20px;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}

.service-card .icon-container {
    background: linear-gradient(135deg, #D89835, #F2B544);
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-card .icon-container img {
    width: 42px;
    height: 42px;
}

.service-card h5 {
    font-weight: 700;
    color: #333;
    margin-bottom: 6px;
}

.service-card p {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 20px;
}

.btn-whatsapp {
    background-color: #D89835;
    color: white;
    border-radius: 50px;
    font-weight: 600;
    transition: 0.3s;
    padding: 8px 18px;
    font-size: 15px;
}

.btn-call {
    background-color: #5F5F5F;
    color: white;
    border-radius: 50px;
    font-weight: 600;
    transition: 0.3s;
    padding: 8px 18px;
    font-size: 15px;
}

.btn-whatsapp:hover,
.btn-call:hover {
    opacity: 0.9;
    transform: scale(1.03);
}
.customer-service-section {
    background: linear-gradient(135deg, rgba(242,181,68,0.2), rgba(255,255,255,0.4));
    background-size: 200% 200%;
    animation: bg-move 10s ease infinite;
}

/* الشريط العلوي فوق الكارت */
.top-strip {
    height: 8px;
    width: 100%;
    background-color: #D89835;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    margin-bottom: 15px;
}

</style>

@if (count($admins) > 0)
<section class="customer-service-section py-5" id="Countries">
    <div class="container">

        <!-- عنوان الصفحة -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">خدمة العملاء</h1>
            <p class="section-subtitle">لخدمة عملاء متميزة على مدار الساعة</p>
        </div>

        <!-- البطاقات -->
        <div class="row gy-4">
            @foreach($admins as $admin)
                <div class="col-lg-3 col-md-6">
                    <div class="service-card shadow-sm h-100">
                        <!--<div class="top-strip"></div>-->
                        <div class="icon-container">
                            <img src="{{ asset('frontend/img/customer-service.png') }}" alt="خدمة العملاء">
                        </div>
                        <h5>{{ $admin->name }}</h5>
                        <p>نخدمكم على مدار <strong>24/7</strong></p>
                        <div class="d-grid gap-2">
                            <a href="https://api.whatsapp.com/send?phone={{ $admin->phone }}" class="btn btn-whatsapp">
                                <i class="bi bi-whatsapp me-1"></i> واتساب
                            </a>
                            <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                <i class="bi bi-telephone me-1"></i> اتصال
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@else
{{--    <section class="Countries-section" id="Countries">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="Countries-title">--}}
{{--                <div class="Countries-title-heading">--}}
{{--                    <h6>{{__('frontend.recruitmentCountries')}} </h6>--}}
{{--                </div>--}}
{{--                <h2> {{__('frontend.chooseRecruitmentCountry')}}</h2>--}}
{{--            </div>--}}
{{--            <div class="Countries-boxes">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div> <img src="{{asset('frontend')}}/img/countries/1.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title">{{__('frontend.uganda')}}</div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}}</p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/2.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.kenya')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/3.jpeg" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.bangladesh')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/4.jpeg" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.Philippine')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-2"></div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/5.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.india')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}}</p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/6.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.mauritania')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn">{{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/7.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.Djibouti')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endif
