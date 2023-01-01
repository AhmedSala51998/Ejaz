@extends('frontend.layouts.layout')

@section('title')
تواصل معنا
@endsection

@section('styles')
    <style>
    </style>
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
                                        عنوان مقرنا :
                                    <a target="_blank" href="https://goo.gl/maps/p3CTJFUrgS6djGSW6" >   {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}}</a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-phone"></i></span>
                                    <p class="ms-3">
                                        المبيعات :
                                    <a href="tel:"> {{$settings->phone1??"+996 0123456789"}} </a>
                                    <a href="tel:"> {{$settings->phone2??"+996 0123456789"}} </a>
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
                        <form  id="Form" class="row needs-validation " action="{{route('front.contact_us_action')}}" method="post" novalidate data-aos="fade-up">
                            @csrf
                            <div class="circleBlur"></div>
                            <div class="circleBlur2"></div>
                            <div class="col-md-12 p-2">
                                <label class="form-label"> <i class="fas fa-user me-2"></i> {{__('frontend.FullName')}}*  </label>
                                <input data-validation="required" id="contact_name" name="name" type="text" class="form-control">

                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label"><i class="fas fa-phone-alt me-2"></i>  {{__('frontend.Phone Number')}} *</label>
                                <input onkeypress="return isNumber(event)" data-validation="required" name="phone" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label"> <i class="fa-solid fa-comment-lines me-2"></i> {{__('frontend.Subject')}}
                                </label>
                                <input type="text" data-validation="required" name="subject"  class="form-control">
                            </div>
                            <div class="col-md-12 p-2">
                                <label class="form-label"> <i class="fas fa-feather-alt me-2"></i>  {{__('frontend.Your Message')}}* </label>
                                <textarea class="form-control" rows="5" data-validation="required" name="message"></textarea>
                            </div>
                            <div class="col-md-12 text-center pt-2">
                                <button type="submit" class="animatedLink">
                                    {{__('frontend.Send Message')}}
                                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 p-2 " data-aos=" fade-up">
                        <iframe class="googleMap wow fadeInUp "
                                src="https://maps.google.com/maps?q={{$settings->latitude}},{{$settings->longitude}}&hl=ar&z=14&amp;output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
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
@section('js')
    <script>

        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function () {

                },
                success: function (data) {
                    // var name = `${$("#contact_name").val()}`;
                    cuteAlert({
                        title: "{{__('frontend.Message Successfully Sent')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success", // or 'info', 'error', 'warning'
                        buttonText: "{{__('frontend.confirm')}}"
                    });
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>
                                <span></span>`)

                    $('#Form')[0].reset();
                },
                error: function (data) {
                    if (data.status === 500) {

                    }
                    if (data.status === 422) {

                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
    </script>

@endsection
