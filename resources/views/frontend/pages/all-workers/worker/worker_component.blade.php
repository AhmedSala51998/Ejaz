<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
.cv-card {
    background: linear-gradient(135deg, rgba(244, 168, 53, 0.1), rgba(255, 241, 219, 0.05));
    border-radius: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.cv-slider {
    width: 100%;
    background: linear-gradient(135deg, #fff, #fdf7f1);
    padding: 0;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 15px;
}

/* برواز الصورة */
.cv-image-wrapper {
    width: 100%;
    height: 420px;
    background: #fff;
    border: 2px solid rgba(245, 166, 35, 0.35);
    border-radius: 20px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    display: block;
}

.cv-image-wrapper img {
    /*width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;*/

    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: top center;
    aspect-ratio: 3 / 4;
    border-radius: 20px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.cv-image-wrapper img:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.swiper-button-next,
.swiper-button-prev {
    color: #f5a623 !important;
}

.swiper-slide {
    /*display: flex;
    justify-content: center;*/

    width: 100% !important;
    flex-shrink: 0;
}

.cv-warning {
    background-color: #f4a835;
    border-radius: 14px;
    padding: 12px 18px;
    margin: 15px 10px;
    text-align: center;
}

.cv-warning p {
    color: #FFF;
    font-weight: bold;
    font-size: 15px;
    margin: 0;
    line-height: 1.7;
}

.cv-info {
    padding: 20px;
}

.cv-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.cv-info li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    border-bottom: 1px dashed #eee;
    padding-bottom: 8px;
}

.cv-info h6 {
    font-weight: bold;
    color: #6d6e71;
    margin: 0;
    font-size: 15px;
}

.cv-info p {
    margin: 0;
    color: #444;
    font-size: 15px;
    text-align: left;
}

.cv-action {
    text-align: center;
    padding: 15px 20px;
    background: #f5f5f5;
    border-top: 1px solid #eee;
}

.cv-action a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #f5a623;
    color: white;
    padding: 10px 22px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 15px;
    transition: background 0.3s ease;
    text-decoration: none;
}

.cv-action a:hover {
    background: #d48b1c;
}

.cv-action a i {
    font-size: 16px;
}

@media (max-width: 768px) {
    .cv-image-wrapper {
        height: 320px;
    }
}
</style>

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
/* ... نفس CSS المُرسل سابقًا ... */
</style>

<div class="cv-card">
    <!-- سلايدر الصور -->
    <div class="cv-slider">
        <div class="swiper workerCvSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($cv->cv_file) }}">
                        <div class="cv-image-wrapper">
                           
                                <img src="{{ get_file($cv->cv_file) }}" alt="CV Image">
                           
                        </div>
                    </a>
                </div>
                @foreach($cv->images as $image)
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($image->image) }}">
                        <div class="cv-image-wrapper">
                           
                                <img src="{{ get_file($image->image) }}" alt="CV Image">
                        
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
            <div class="swiper-button-next workerCvSliderNext"></div>
            <div class="swiper-button-prev workerCvSliderPrev"></div>
        </div>
    </div>

    <!-- التحذير -->
    <div class="cv-warning">
        <p>لضمان حقك، لايتم سداد الرسوم بعد الحجز الا عن طريق منصة مساند</p>
    </div>

    <!-- بيانات العامل -->
    <div class="cv-info">
        <ul>
            <li><h6>الاسم:</h6><p>{{$cv->cv_name}}</p></li>
            <li><h6>الجنسية:</h6><p>{{$cv->nationalitie->title ?? '-'}}</p></li>
            <li><h6>المهنة:</h6><p>{{$cv->job->title ?? '-'}}</p></li>
            <li><h6>الديانة:</h6><p>{{$cv->religion->title ?? '-'}}</p></li>
            <li><h6>رقم الجواز:</h6><p>{{$cv->passport_number ?? '-'}}</p></li>
            <li><h6>العمر:</h6><p>{{$cv->age ?? '-'}}</p></li>
            <li><h6>الحالة الاجتماعية:</h6><p>{{$cv->social_type->title ?? '-'}}</p></li>

             @if(!isset($rental))
                <li><h6>الراتب:</h6><p>{{$cv->salary ?? '-'}} ريال</p></li>
            @endif

            @if(isset($rental))
                <li><h6>تكلفة الإيجار:</h6><p>{{$cv->rentalprice ?? '-'}} ريال</p></li>
            @elseif(isset($transfer))
                <li><h6>سبب النقل:</h6><p>{{$cv->reasonService ?? '-'}}</p></li>
                <li><h6>مدة العمل عند الكفيل السابق:</h6><p>{{$cv->periodService ?? '-'}}</p></li>
                <li><h6>سعر نقل الخدمات:</h6><p>{{$cv->transferprice ?? '-'}} ريال</p></li>
            @else
                <li><h6>تكلفة الاستقدام:</h6><p>{{$cv->nationalitie->price ?? '-'}} ريال</p></li>
                <li><h6>الخبرة العملية:</h6>
                    <p>
                        @if($cv->type_of_experience=='new')
                            قادم جديد
                        @elseif($cv->type_of_experience=='with_experience')
                            لديه خبرة سابقة
                        @else
                            -
                        @endif
                    </p>
                </li>
            @endif
        </ul>
    </div>

    <!-- زر الحجز -->
    <div class="cv-action">
        @php
            $type = $cv->type;
        @endphp

        @if($type == 'transport')
            <a href="https://api.whatsapp.com/send?phone={{ $settings->whatsappNumber }}">
                <i class="fa-brands fa-whatsapp"></i>
                ارسال طلب نقل
            </a>
        @elseif($type == 'rental')
            <a href="https://api.whatsapp.com/send?phone={{ $settings->whatsappNumber }}">
                <i class="fa-brands fa-whatsapp"></i>
                ارسال طلب تأجير
            </a>
        @else
            @auth
                <a href="{{ route('frontend.show.worker', $cv->id) }}">
                    <i class="fa-solid fa-file-circle-check"></i>
                    حجز السيرة الذاتية
                </a>
            @else
                <a href="{{ route('register', $cv->id) }}">
                    <i class="fa-solid fa-file-circle-check"></i>
                    حجز السيرة الذاتية
                </a>
            @endauth
        @endif
    </div>

</div>

<!-- Swiper JS + Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<script>
    var workerCvSlider = new Swiper(".workerCvSlider", {
        spaceBetween: 0,
        centeredSlides: true,
        speed: 1000,
        navigation: {
            nextEl: ".workerCvSliderNext",
            prevEl: ".workerCvSliderPrev",
        },
    });
</script>
