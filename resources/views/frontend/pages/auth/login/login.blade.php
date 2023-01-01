@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Login Page')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>  {{__('frontend.Login Page')}} </h1>
            <ul>
                <li><a href="{{route('home')}}">{{__('frontend.Home')}} </a></li>
                <li><a href="#!" class="active">  {{__('frontend.Login Page')}} </a></li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        <!-- login form -->
        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 m-auto p-2">
                        <div class="card">
                            <img class="loginImg" src="{{asset('frontend')}}/img/login.svg" alt="">
                            <form method="post" action="{{route('auth.login_action')}}" class="row" id="Form">
                                <div class="col-12 p-2">
                                    <label for="phone" class="form-label"> <i
                                            class="fas fa-phone me-2"></i> {{__('frontend.Phone Number')}} </label>

                                    <div class="input-group">
                                        <input onkeypress="return isNumber(event)" name="phone"
                                               data-validation="required,validatePhoneNumberOfSAR" type="number"
                                               class="form-control" id="phone" placeholder="">
                                        <span class="input-group-text" style="direction: ltr;"> +996 </span>
                                    </div>

                                </div>
                                <div class="col-12 p-2">
                                    <label for="password" class="form-label"> <i
                                            class="fas fa-key me-2"></i> {{__('frontend.Password')}} </label>
                                    <input data-validation="required" type="password" name="password"
                                           class="form-control" id="password" placeholder="">
                                </div>
                                <div class="col-12 p-2">
                                    <div class="d-flex justify-content-between ">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="remember">
                                            <label class="form-check-label"
                                                   for="remember"> {{__('frontend.remember me')}} </label>
                                        </div>
                                        <a href="{{route('auth.forget_password_view')}}"> {{__('frontend.forget Password ?')}}</a>
                                    </div>
                                </div>
                                <div class="col-12 p-2 text-center">

                                    <button type="submit" class="animatedLink">
                                        {{__('frontend.Login')}}
                                        <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </button>
                                </div>
                            </form>
                            <p class="text-center pt-4 pb-2">{{__("frontend.you don't have account ?")}} <a
                                    href="{{route('register')}}">  {{__('frontend.create account')}} </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </content>
@endsection

@section('js')
    <script>
        // Add validator
        $.formUtils.addValidator({
            name: 'validatePhoneNumberOfSAR',
            validatorFunction: function (value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(5)[0-9]{8}$/.test(value);
            },
            errorMessage: "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'badEvenNumber'
        });


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

                    //$('#submit-button').prop('disabled', true);

                    window.setTimeout(function () {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled', false)
                        $('#submit_button').html(`<p>{{__('frontend.Login')}}</p> <span></span>`)
                        window.location.href = '{{route('auth.profile')}}';
                    }, 1000);

                },
                error: function (data) {
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`<p>{{__('frontend.Login')}}</p> <span></span>`)
                    if (data.status === 400) {
                        cuteToast({
                            type: "warning", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.your account had blocked , please sent to support')}}",
                            timer: 3000
                        })
                    }

                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Your Phone Or Password Is Not Correct')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax


        });//end submit


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

