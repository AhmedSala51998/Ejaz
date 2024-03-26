
<!-- *** services *** -->
@if (count($ourServices)>0)
    <section class="popular_service" id="popular_service">
        <div class="SectionTitle ">
            <h1 class="title" data-aos="fade-up"> خدمات الاستقدام </h1>
            <h6 class="hint" data-aos="fade-up"> تعرف علي الخدمات التي نقدمها للمجتمع ... </h6>
        </div>

        {{--    <h2>أبرز خدماتنا</h2>--}}
        <div class="container">
            <div class="row">
                @foreach($ourServices as $service)
                <div class="col-lg-3 col-md-4 col-6 p-2" >
                    <a href="{{route('all-workers')}}">
                    <div class="service">
                        <img src="{{get_file($service->image)}}" alt="">
                        <h6> {{$service->title}}</h6>
                        <p> {{$service->desc}} </p>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@else
<section class="popular_service">
    <div class="SectionTitle ">
                            <h2 class="title" data-aos="fade-up"> خدمات الاستقدام </h2>
                            <h6 class="hint" data-aos="fade-up"> تعرف علي الخدمات التي نقدمها للمجتمع ... </h6>
    </div>

{{--    <h2>أبرز خدماتنا</h2>--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6 p-2">
                <div class="service">
                    <img src="{{asset('frontend')}}/img/icons/icon1.svg" alt="">
                    <h6> طلب استقدام </h6>
                    <p> دفع رسوم الاستقدام عبر التعاقد في برنامج مساند </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 p-2">
                <div class="service">
                    <img src="{{asset('frontend')}}/img/icons/icon2.svg" alt="">
                    <h6> اختيار العمالة</h6>
                    <p>ت اختيار السيره الذاتيه للعماله المنزليه عبر البحث في برنامج مساند ومن خلال الموقع الالكتروني</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 p-2">
                <div class="service">
                    <img src="{{asset('frontend')}}/img/icons/icon3.svg" alt="">
                    <h6>رعاية الأطفال والمسنين</h6>
                    <p>توفير جليسات الأطفال ورعاية وكبار السن.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 p-2">
                <div class="service">
                    <img src="{{asset('frontend')}}/img/icons/icon4.svg" alt="">
                    <h6>خدمات الضيافة والخدم</h6>
                    <p>توفير موظفين لخدمة الضيوف في المناسبات والفعاليات.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 p-2">
                <div class="service">
                    <img src="{{asset('frontend')}}/img/icons/icon4.svg" alt="">
                    <h6>خدمات الضيافة والخدم</h6>
                    <p>توفير موظفين لخدمة الضيوف في المناسبات والفعاليات.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
