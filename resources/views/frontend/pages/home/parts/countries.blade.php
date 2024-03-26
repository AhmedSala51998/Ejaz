@if (count($countries)>0)

    <section class="countries" id="countrie">
        <div class="container">
            <!-- Section Title -->
            <div class="SectionTitle">
                <h1 class="title" data-aos="fade-up"> دول الاستقدام </h1>
                <h6 class="hint" data-aos="fade-up"> نقوم بالاستقدام من مختلف الدول التي توفر عمالة مهرة ... </h6>
            </div>
            <div class="allCountries">
                <div class="row justify-content-center">
                     @foreach($countries as $country)
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{get_file($country->image)}}" alt="">
                            <h2> {{$country->country_name}} </h2>
                            <p>{{$country->desc}} </p>
                            <a href="{{route('all-workers',$country->id)}}" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>









@else



    <section class="countries">
        <div class="container">
            <!-- Section Title -->
            <div class="SectionTitle">
                <h1 class="title" data-aos="fade-up"> دول الاستقدام </h1>
                <h6 class="hint" data-aos="fade-up"> نقوم بالاستقدام من مختلف الدول التي توفر عمالة مهرة ... </h6>
            </div>
            <div class="allCountries">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/1.png" alt="">
                            <h2> اوغندا </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/2.png" alt="">
                            <h2> كينيا </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/3.jpeg" alt="">
                            <h2> بنغلادش </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/4.jpeg" alt="">
                            <h2> الفلبين </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/5.png" alt="">
                            <h2> الهند </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/6.png" alt="">
                            <h2> موريتانيا </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-1" data-aos="flip-left">
                        <div class="country">
                            <img src="{{asset('frontend')}}/img/countries/7.png" alt="">
                            <h2> جيبوتي </h2>
                            <p>مدة الاستقدام في خلال 60 يوم </p>
                            <a href="#!" class="animatedLink">
                                اطلب الآن
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







@endif
