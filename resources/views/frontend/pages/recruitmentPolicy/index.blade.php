@extends('frontend.layouts.layout')

@section('title')
    سياسات وقوانين الاستقدام داخل المملكة
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>



        <!-- policies -->
        <section class="policies">
            <div class="container">

                <h1 class="" data-aos=" fade-up">سياسات وقوانين الاستقدام داخل المملكة </h1>
                <h4 class="" data-aos=" fade-up">حتى تتسنى لك الفرصة باستقدام عمالة منزلية داخل المملكة يجب مراعات الضوابط
                    الاتية والتي
                    اقرتها الحكومة طبقا
                    للدستور السعودي حتى تضمن لكلا من العامل وصاحب العمل حقوقهم وواجباتهم </h4>

                <div class="links " data-aos=" fade-up">
                    <a download href="{{get_file($pdf->employer_rights_and_duties)}}"> <i class="fa-solid fa-file-pdf me-2"></i> حقوق وواجبات صاحب العمل </a>
                    <a download href="{{get_file($pdf->rights_and_duties_of_domestic_workers)}}"> <i class="fa-solid fa-file-pdf me-2"></i> حقوق وواجبات العمالة المنزلية </a>
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
