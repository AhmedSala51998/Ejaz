
@if (count($admins)>0)
    <section class="Countries-section" id="Countries">
        <div class="container-fluid">
            <!-- Section Title -->
            <div class="SectionTitle">
                <h1 class="title" data-aos="fade-up"> خدمة العملاء </h1>
                <h6 class="hint" data-aos="fade-up"> لخدمة عملاء متميزة ... </h6>
            </div>
            <div class="Countries-boxes">
                <div class="row">
                    @foreach($admins as $key=> $admin)
                        <div class="col-lg-3 col-md-6">
                            <div class="Countries-block">
                                <div class="Countries-media">
                                    <div> <img src="{{asset('frontend')}}/img/customer-service.png" alt=""/></div>
                                </div>
                                <div class="Countries-content">
                                    <div class="count-content-title">{{$admin->name}}</div>
                                    <p>نخدمكم علي مدار 24/7 </p>
                                    <a href="https://api.whatsapp.com/send?phone={{$admin->phone}}" class="defaultBtn"> واتساب  </a>
                                    <a href="tel:{{$admin->phone}}" class="defaultBtn"> اتصال  </a>
                                </div>
                            </div>
                        </div>
                        @if($key==3 or $key==7 or $key==15)
                            <div class="col-lg-2"></div>
                        @endif
                    @endforeach

                </div>
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
