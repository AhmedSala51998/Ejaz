@extends('frontend.layouts.layout')

@section('title')
تواصل معنا
@endsection

@section('styles')
<style>
    body {
        background-color: #fffefc;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
    }

    .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
    }

    .banner::before {
        content: '';
        position: absolute;
        top: -100px;
        left: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        z-index: 0;
    }

    .banner h1 {
        font-size: 3rem;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .banner ul li a {
        color: #333;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .banner ul li a.active,
    .banner ul li a:hover {
        color: #fff;
        background: #f4a835;
        padding: 6px 14px;
        border-radius: 12px;
    }

    .mapEarth,
    .contactForm {
        padding: 60px 0;
        background: linear-gradient(135deg, #fff9f0, #fffdfc);
    }

    .title span {
        font-size: 24px;
        font-weight: 700;
        color: #f4a835;
        display: inline-block;
    }

    .companyInfo ul {
        list-style: none;
        padding: 0;
    }

    .companyInfo li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(244, 168, 53, 0.8); /* هذا هو اللون البرتقالي المستخدم عندك */
        padding: 20px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .companyInfo li span {
        border: 1px solid rgba(244, 168, 53, 0.8) !important;
        width: 42px;
        height:40px
    }

    .companyInfo li i {
        font-size: 24px;
        color: #f4a835;
        margin-right: 15px;
        margin-left: 13px;
    }

    .contactForm form {
        background: rgba(255, 255, 255, 0.7);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
        backdrop-filter: blur(8px);
    }

    .contactForm input,
    .contactForm textarea {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        font-size: 15px;
    }

    .googleMap iframe {
        width: 100%;
        min-height: 400px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /*.references {
        background-color: #f9f3ea;
        padding: 40px 0;
    }

    .referenceLogo {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        text-align: center;
        transition: 0.3s ease;
    }

    .referenceLogo img {
        max-height: 60px;
        filter: grayscale(1);
        transition: 0.3s;
    }

    .referenceLogo:hover img {
        filter: grayscale(0);
        transform: scale(1.05);
    }*/

    .earth {
        width: 100%;
        height: 400px;
        background: radial-gradient(circle at center, #e0e0e0, #ccc);
        border-radius: 50%;
        box-shadow: inset 0 0 20px rgba(0,0,0,0.1), 0 0 25px rgba(244,168,53,0.2);
        position: relative;
        animation: rotateGlobe 25s linear infinite;
    }

    @keyframes rotateGlobe {
        from { transform: rotateY(0); }
        to { transform: rotateY(360deg); }
    }
    .custom-contact-form {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        padding: 40px 30px;
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(255,255,255,0.25);
    }

    .custom-contact-form .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .custom-contact-form input,
    .custom-contact-form textarea {
        width: 100%;
        border: none;
        border-bottom: 2px solid #ccc;
        background: transparent;
        padding: 10px 10px 10px 0;
        font-size: 16px;
        color: #333;
        transition: all 0.3s ease;
        border-radius: 0;
    }

    .custom-contact-form input:focus,
    .custom-contact-form textarea:focus {
        border-color: #f4a835;
        outline: none;
    }

    .custom-contact-form label {
        position: absolute;
        top: 10px;
        right: 0;
        font-size: 15px;
        color: #888;
        pointer-events: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .custom-contact-form input:focus + label,
    .custom-contact-form input:not(:placeholder-shown) + label,
    .custom-contact-form textarea:focus + label,
    .custom-contact-form textarea:not(:placeholder-shown) + label {
        top: -18px;
        font-size: 13px;
        color: #f4a835;
    }

    .custom-contact-form input::placeholder,
    .custom-contact-form textarea::placeholder {
        color: transparent;
    }

    .submit-button {
        background: #f4a835;
        color: #fff;
        border: none;
        padding: 12px 35px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 30px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .submit-button:hover {
        background-color: #da8e18;
        transform: scale(1.05);
    }
    /* رسائل الخطأ */
    .error-message {
        color: red;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .d-none {
        display: none !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .custom-contact-form {
            padding: 25px 20px;
        }

        .submit-button {
            width: 100%;
        }
    }
    /* حركات عند الظهور */
    @keyframes fadeSlideIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideIn 0.8s ease forwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }

    .submit-button {
        animation: fadeSlideIn 1s ease forwards;
        animation-delay: 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeSlideIn {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
    }

    .form-group {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideIn 0.8s ease forwards;
        position: relative;
        margin-bottom: 25px;
    }

    /* تسلسل التأخير */
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }

    .submit-button {
        animation: fadeSlideIn 1s ease forwards;
        animation-delay: 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    /* تركيز الحقول */
    .custom-contact-form input:focus,
    .custom-contact-form textarea:focus {
        border-color: #f4a835;
        box-shadow: 0 0 12px rgba(244, 168, 53, 0.3);
        background-color: #fffefc;
        outline: none;
    }

    /* تحسين شكل الحقول */
    .custom-contact-form input,
    .custom-contact-form textarea {
        width: 100%;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #ccc;
        padding: 12px 18px;
        transition: 0.3s ease;
        font-size: 15px;
    }

    /* تحسين التسمية (label) */
    .custom-contact-form label {
        font-weight: bold;
        color: #333;
        margin-bottom: 6px;
        display: inline-block;
    }

    .custom-contact-form label i {
        color: #f4a835;
        margin-left: 5px;
        margin-right:5px
    }

    /* الزر */
    .submit-button {
        background: #f4a835;
        color: #fff;
        padding: 12px 40px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .submit-button:hover {
        background: #d89215;
        transform: scale(1.05);
    }

    .submit-button i {
        margin-right: 6px;
        transition: transform 0.3s ease;
    }

    .submit-button:hover i {
        transform: translateX(-4px);
    }
    .error-message {
        color: #d92d20;
        font-size: 14px;
        margin-top: 4px;
        display: block;
    }

    .is-invalid {
        border-color: #d92d20 !important;
        box-shadow: 0 0 6px rgba(217, 45, 32, 0.2);
    }

    /* ✅ شكل الكرة */
    .earth {
        width: 100%;
        height: 400px;
        background: radial-gradient(circle at 40% 40%, #ffffff, #f2f2f2);
        border-radius: 50%;
        box-shadow: inset 0 0 40px rgba(0,0,0,0.08), 0 0 30px rgba(244, 168, 53, 0.2);
        position: relative;
        animation: rotateGlobe 35s linear infinite;
        transition: all 0.3s ease-in-out;
    }

    /* ✅ دوران الكرة */
    @keyframes rotateGlobe {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(360deg); }
    }

    /* ✅ خلفية خلف الكرة */
    .worldMap {
        position: relative;
        z-index: 1;
        background: radial-gradient(circle at center, rgba(255, 242, 210, 0.2), transparent);
        border-radius: 50%;
        padding: 30px;
    }

    /* ✅ تحريك النقاط */
    #orbic_dots use {
        animation: moveDot 4s ease-in-out infinite;
    }
    @keyframes moveDot {
        0% { transform: translateY(0px); opacity: 0.4; }
        50% { transform: translateY(-6px); opacity: 1; }
        100% { transform: translateY(0px); opacity: 0.4; }
    }

    /* ✅ صور المستخدمين */
    #orbic_users image {
        transition: 0.3s ease-in-out;
    }
    #orbic_users image:hover {
        transform: scale(1.08);
        filter: drop-shadow(0 0 10px #f4a835);
    }

    .user-bubble {
            position: absolute;
            background: #fff;
            color: #333;
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            animation: fadeInBubble 0.6s ease forwards;
            opacity: 0;
            z-index: 2;
            transform: translateY(-10px);
        }

        @keyframes fadeInBubble {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        #orbic_users image {
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        #orbic_users image:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 10px #f4a835);
        }

        .user-bubble {
        position: absolute;
        background: #fff;
        color: #333;
        font-size: 14px;
        padding: 10px 16px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
        animation: fadeInBubble 0.6s ease forwards;
        opacity: 0;
        transform: translateY(10px);
        z-index: 10;
    }

    /* ✅ السهم (Tail) */
    .user-bubble::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 8px 8px 0 8px;
        border-style: solid;
        border-color: #fff transparent transparent transparent;
    }

    /* ✅ أنيميشن الرسالة */
    @keyframes fadeInBubble {
        0% { opacity: 0; transform: translateY(20px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ✅ تأثير عند تمرير الماوس */
    #orbic_users image:hover {
        transform: scale(1.1);
        filter: drop-shadow(0 0 12px #f4a835);
        transition: all 0.3s ease-in-out;
    }

    /* ✅ تحسين شكل فقاعات الرسائل */
    .user-bubble {
        position: absolute;
        background: #fff;
        color: #333;
        font-size: 14px;
        padding: 10px 16px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
        animation: fadeInBubble 0.6s ease forwards;
        opacity: 0;
        transform: translateY(10px);
        z-index: 10;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .user-bubble::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 8px 8px 0 8px;
        border-style: solid;
        border-color: #fff transparent transparent transparent;
    }

    @keyframes fadeInBubble {
        0% { opacity: 0; transform: translateY(20px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .user-bubble {
    position: absolute;
    background-color: #fff;
    color: #333;
    padding: 10px 16px;
    border-radius: 25px;
    font-size: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    z-index: 100;
    display: none; /* البداية مخفية */
    opacity: 0;
    transform: scale(0.5);
    transition: all 0.6s ease;
    }

    .user-bubble.show {
    display: block;
    opacity: 1;
    transform: scale(1);
    }
/* خلفية القسم ثلاثية الأبعاد مع تدرج ناعم */
  .references {
    background: linear-gradient(145deg, #fffdfa, #fff9f3 50%, #f5f1ec);
    box-shadow: inset 0 10px 60px rgba(255 168 0 / 0.15);
    padding-bottom: 80px;
  }

  /* عنوان القسم */
  .sectionTitle h2 {
    font-weight: 900;
    font-size: 3rem;
    color: #222;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
    text-shadow: 0 2px 8px rgba(255 153 0 / 0.25);
  }

  .sectionTitle p {
    font-size: 1.3rem;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
    font-weight: 600;
    letter-spacing: 0.3px;
  }

  /* كروت الزجاج */
  .referenceLogo {
    position: relative;
    height: 240px;
    background: rgba(255 255 255 / 0.12);
    border-radius: 30px;
    border: 2px solid rgba(255 168 0 / 0.4);
    backdrop-filter: blur(22px);
    -webkit-backdrop-filter: blur(22px);
    box-shadow:
      0 15px 30px rgba(255 168 0 / 0.22),
      inset 0 0 40px rgba(255 255 255 / 0.35);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55), box-shadow 0.6s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* تأثير اللمعان */
  .referenceLogo .shine {
    position: absolute;
    top: -70%;
    left: -70%;
    width: 200%;
    height: 200%;
    background: linear-gradient(120deg, rgba(255 255 255 / 0.35) 0%, transparent 60%);
    transform: rotate(25deg);
    pointer-events: none;
    animation: shineMove 3s linear infinite;
    opacity: 0.7;
  }

  @keyframes shineMove {
    0% {
      transform: translateX(-100%) rotate(25deg);
    }
    100% {
      transform: translateX(100%) rotate(25deg);
    }
  }

  /* تأثير التحويم ثلاثي الأبعاد */
  .referenceLogo:hover {
    transform: perspective(600px) translateY(-20px) scale(1.12) rotateX(8deg) rotateZ(-3deg);
    box-shadow:
      0 0 40px rgba(255 168 0 / 0.7),
      0 25px 60px rgba(255 168 0 / 0.45);
    border-color: rgba(255 168 0 / 0.9);
    background: rgba(255 255 255 / 0.25);
  }

  /* الصور داخل الكروت */
  .referenceLogo img {
    max-height: 140px;
    max-width: 100%;
    object-fit: contain;
    filter: drop-shadow(0 0 3px rgba(255 168 0, 0.5));
    transition: transform 0.6s ease, filter 0.6s ease;
    position: relative;
    z-index: 3;
  }

  .referenceLogo:hover img {
    transform: scale(1.18);
    filter: drop-shadow(0 0 12px rgba(255 168 0, 0.85));
  }

  /* نقاط السلايدر - مستديرة وكبيرة مع توهج */
  .swiper-pagination-bullet {
    background: #ffb700;
    width: 14px;
    height: 14px;
    margin: -40px 8px !important;
    border-radius: 50%;
    opacity: 0.8;
    box-shadow: 0 0 10px rgba(255 183 0, 0.4);
    transition: all 0.35s ease;
  }

  .swiper-pagination-bullet-active {
    background: #cc8b00;
    width: 18px;
    height: 18px;
    opacity: 1;
    box-shadow: 0 0 20px rgba(204 139 0, 0.9);
    transform-origin: center;
    animation: pulse 1.6s infinite;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
      opacity: 1;
    }
    50% {
      transform: scale(1.2);
      opacity: 0.7;
    }
  }

  /* Responsive */
  @media (max-width: 992px) {
    .referenceLogo {
      height: 200px;
      padding: 20px 25px;
    }
    .referenceLogo img {
      max-height: 110px;
    }
  }
  @media (max-width: 576px) {
    .sectionTitle h2 {
      font-size: 2.3rem;
    }
    .sectionTitle p {
      font-size: 1.1rem;
    }
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> تواصل معنا </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active"> تواصل معنا </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        <!-- mapEarth -->
        <section class="mapEarth">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="worldMap">
                            <audio id="bubbleSound" preload="auto">
                                <source src="{{ asset('frontend/sounds/pop.mp3') }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <div class="bubble-container">
                                <!-- فوق user1 (يسار فوق - بدلة زرقا) -->
                                <div class="user-bubble" style="top: 31.5%; left: -2%;">مرحباً 👋 بك</div>

                                <!-- فوق user2 (وسط - بنية/وردي) -->
                                <div class="user-bubble" style="top: 23.5%; left: 34.5%;">تواصل معنا الآن</div>

                                <!-- فوق user3 (يمين فوق - شعر برتقالي) -->
                                <div class="user-bubble" style="top: 14.8%; left: 65.8%;">استفسر الآن</div>

                                <!-- فوق user4 (يمين تحت - شعر أسود) -->
                                <div class="user-bubble" style="top: 45.2%; left: 64.3%;">خدمتك شرف لنا</div>

                                <!-- فوق user5 (يسار تحت - أخضر) -->
                                <div class="user-bubble" style="top: 55.5%; left: 15.5%;">أهلاً وسهلاً</div>
                            </div>

                            <div class="earth"></div>
                            <div class="orbic">
                                <svg viewBox="0 0 500 500" width="0" height="0">
                                    <g id="orbic_path">
                                        <ellipse cx="250" cy="250" rx="240" ry="100" transform="rotate(-10,250,250)"></ellipse>
                                        <path d="M230,192Q300,25 375,146"></path>
                                        <path d="M375,146Q450,175 410,301"></path>
                                        <path d="M40,234Q300,125 410,301"></path>
                                        <path d="M410,301Q260,165 125,354"></path>
                                        <path d="M125,354Q150,220 230,192"></path>
                                        <path d="M40,234Q130,200 125,354"></path>
                                    </g>
                                    <g id="orbic_dots">
                                        <defs>
                                            <circle id="orbic_dot" cx="0" cy="0" r="6"></circle>
                                        </defs>
                                        <use id="orbic_dot1" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot2" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot3" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot4" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot5" xlink:href="#orbic_dot"></use>
                                    </g>
                                    <g id="orbic_users">
                                        <image id="orbic_user1" xlink:href="{{asset('frontend')}}/img/user1.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user2" xlink:href="{{asset('frontend')}}/img/user2.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user3" xlink:href="{{asset('frontend')}}/img/user3.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user4" xlink:href="{{asset('frontend')}}/img/user4.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user5" xlink:href="{{asset('frontend')}}/img/user5.webp" width="20%" height="20%"></image>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-lg-5">
                        <h4 class="title"> <span> كن علي اتصال </span> </h4>
                        <div class="companyInfo ">
                            <ul>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-map-location"></i></span>
                                    <p class="ms-3">
                                        فروعنا :
                                    <a target="_blank" href="https://goo.gl/maps/p3CTJFUrgS6djGSW6" >   {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}}</a> - <br>
                                    <a target="_blank" href="https://goo.gl/maps/p3CTJFUrgS6djGSW6" >   {{$settings->address2??"السعودية - الرياض - شارع الوحدة"}}</a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-phone"></i></span>
                                    <p class="ms-3">
                                        المبيعات :
                                        <a href="tel:"> {{$settings->callNumber??"+996 0123456789"}} </a>
                                        <a href="tel:"> {{$settings->whatsappNumber??"+996 0123456789"}} </a>
                                        <a href="tel:"> {{$settings->phone1??"+996 0123456789"}} </a>
                                        <a href="tel:"> {{$settings->phone2??"+996 0123456789"}} </a>
                                        <a href="tel:"> {{$settings->phone3??"+996 0123456789"}} </a>
                                        <a href="tel:"> {{$settings->phone4??"+996 0123456789"}} </a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-message-question"></i></span>
                                    <p class="ms-3">
                                        الشكاوي والاقتراحات :
                                        <a href="tel:{{$settings->phone1}}">{{$settings->phone1}}</a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fas fa-envelope"></i></span>
                                    <p class="ms-3">
                                        البريد الالكتروني :
                                        <a href="mailto:{{$settings->email1}}">{{$settings->email1}}</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- contact Form -->
        <section class="contactForm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2  mb-5 mb-md-0 " data-aos=" fade-up">
                        <div class="headTitle text-start ">
                            <h2> تواصل معنا </h2>
                            <p> اطلب عاملتك الان وسيقوم فريق خدمة العملاء لدينا بالتواصل معك بأسرع وقت ... </p>
                        </div>
                            <form id="Form" class="custom-contact-form" action="{{route('front.contact_us_action')}}" method="post" novalidate>
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" required placeholder=" ">
                                    <label><i class="fas fa-user"></i> الاسم كامل *</label>
                                    <small class="error-message"></small>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" required onkeypress="return isNumber(event)" placeholder=" ">
                                    <label><i class="fas fa-phone-alt"></i> رقم الجوال *</label>
                                    <small class="error-message"></small>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="subject" placeholder=" ">
                                    <label><i class="fas fa-comment-dots"></i> الموضوع</label>
                                    <small class="error-message"></small>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" rows="4" required placeholder=" "></textarea>
                                    <label><i class="fas fa-feather-alt"></i> رسالتك *</label>
                                    <small class="error-message"></small>
                                </div>

                                <div class="text-center pt-3">
                                    <button type="submit" class="submit-button" id="submit_button">
                                        <i class="fas fa-paper-plane ms-2"></i> إرسال
                                    </button>
                                </div>
                            </form>


                    </div>
                    <div class="col-md-6 p-2 " data-aos=" fade-up">
                        </iframe class="googleMap wow fadeInUp ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14568.708601963628!2d38.0609721!3d24.0952649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15b9072220f00e2f%3A0xc45245d46a507938!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1711472449580!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </div>
        </section>
        <!-- ================ references ================= -->
       <section class="references py-6">
        <div class="container">
            <div class="sectionTitle text-center mb-5" data-aos="fade-up">
            <h2>الجهات المرجعية</h2>
            <p>نفخر بالتعاون مع أبرز الجهات الحكومية والرسمية</p>
            </div>

            <div class="swiper referencesSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="وزارة الخارجية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="وزارة الداخلية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="وزارة الموارد البشرية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/musand.svg" alt="مساند" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
            </div>
            <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
        </section>



    </content>
@endsection
@section('js')
<script>
    document.getElementById("Form").addEventListener("submit", function (e) {
        e.preventDefault();
        let valid = true;

        const inputs = this.querySelectorAll("input[required], textarea[required]");
        inputs.forEach(input => {
            const errorMsg = input.nextElementSibling;
            const value = input.value.trim();

            if (value === "") {
                errorMsg.textContent = "هذا الحقل مطلوب";
                input.classList.add("is-invalid");
                valid = false;
            } else {
                errorMsg.textContent = "";
                input.classList.remove("is-invalid");
            }

            // ✅ رقم جوال سعودي فقط
            if (input.name === "phone" && value !== "" && !/^(00966|966|\+966|0)?5\d{8}$/.test(value)) {
                errorMsg.textContent = "يرجى إدخال رقم جوال سعودي صحيح يبدأ بـ 05 ويتكون من 10 أرقام";
                input.classList.add("is-invalid");
                valid = false;
            }
        });

        if (valid) {
            var myForm = this;
            var formData = new FormData(myForm);
            var url = myForm.getAttribute('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true);
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`);
                },
                complete: function () {
                    // يمكنك إضافة أكشن بعد الإرسال لو أردت
                },
                success: function (data) {
                    cuteAlert({
                        title: "{{__('frontend.Message Successfully Sent')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success",
                        buttonText: "{{__('frontend.confirm')}}"
                    });

                    $('#submit_button').attr('disabled', false);
                    $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i> <span></span>`);
                    myForm.reset();
                },
                error: function (data) {
                    if (data.status === 500) {
                        // خطأ داخلي في السيرفر
                    }
                    if (data.status === 422) {
                        // خطأ تحقق من البيانات
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

    // 🔢 منع إدخال غير الأرقام في الحقول الرقمية
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    const sound = document.getElementById('bubbleSound');
    const bubbles = document.querySelectorAll('.user-bubble');

    // لازم يكون في تفاعل عشان يشتغل الصوت على معظم المتصفحات
    document.body.addEventListener('click', () => {
        sound.play().catch(() => {});
        sound.pause(); // نوقفه فورًا عشان الإذن يتفتح
    }, { once: true });

    bubbles.forEach((bubble, i) => {
        setTimeout(() => {
            bubble.classList.add('show');

            const clonedSound = sound.cloneNode();
            clonedSound.play().catch(err => {
                console.warn("Sound play error:", err);
            });

        }, i * 600);
    });
});
</script>
<script>
  var swiper = new Swiper(".referencesSlider", {
    loop: true,
    spaceBetween: 45,
    slidesPerView: 3,
    speed: 900,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>

@endsection
