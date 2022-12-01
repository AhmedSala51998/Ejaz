@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Forget Password Page')}}
@endsection

@section('styles')
    <style></style>
@endsection


@section('content')
    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> {{__('frontend.Forget Password Page')}} </h1>
            <ul>
                <li><a href="{{route('home')}}">{{__('frontend.Home')}}  </a></li>
                <li><a href="#!" class="active"> {{__('frontend.Forget Password Page')}} </a></li>
            </ul>
        </div>
        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 m-auto p-2">
                        <div class="card">
                            <img class="loginImg" src="{{asset('frontend')}}/img/phone.svg" alt="">
                            <h6 class="text-center mb-4"> {{__('frontend.Phone Number')}} </h6>
                            <form id="forget_password" method="post" action="{{route('auth.forget_password_action')}}"
                                  class="row">
                                @csrf
                                <div class="col-12 p-2">
                                    <div class="input-group">
                                        <input data-validation="required,validatePhoneNumberOfSAR" id="phone"
                                               onkeypress="return isNumber(event)" name="phone" type="text"
                                               class="form-control" placeholder="5********">
                                        <span class="input-group-text" style="direction: ltr;"> +996 </span>
                                    </div>
                                </div>
                                <div class="col-12 py-4 p-2 text-center">
                                    <button id="submit_button" type="submit" class="animatedLink">
                                        {{__('frontend.Send Reset Password Link')}}
                                        <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                    </button>
                                </div>
                            </form>
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
                return /^(5)(5|0|3|6|4|9|1|8|7|2)([0-9]{7})$/.test(value);
            },
            errorMessage: "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'badEvenNumber'
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }

        $(document).on('submit', 'form#forget_password', function (e) {
            e.preventDefault();
            var myForm = $("#forget_password")[0]
            var formData = new FormData(myForm)
            var url = $('#forget_password').attr('action');
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
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.Send Reset Password Link')}}</p> <span></span>`)
                        location.replace("{{route('auth.forget-email-sent-successfully')}}")
                    }, 2000);

                },
                error: function (data) {
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.Send Reset Password Link')}}</p> <span></span>`)

                    if (data.status === 400) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is not exists')}}",
                            timer: 3000
                        })
                    }

                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
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
    </script>
@endsection
