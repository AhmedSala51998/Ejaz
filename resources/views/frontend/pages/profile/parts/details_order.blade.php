@extends('frontend.layouts.layout')
@section('title')
    {{__('frontend.profile')}}
@endsection
@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <content>
        <!-- ================ profile ================= -->
        <section class="profile">
            <div class="container ">
                <!-- /user Header  -->
                <div class="row justify-content-center">
                    <!-- links -->
                    <div class=" col-lg-9 p-2">
                        <!-- user Header  -->
                        <div class=" userHeader">
                            <div class="userInfo">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="userName">
                                        <h3>{{$user->name}}</h3>
                                        <p> {{$user->phone}} </p>
                                    </div>
                                </div>
                                <div class="control">
                                    <a href="{{route('auth.logout')}}" data-bs-toggle="tooltip" title=" {{__('frontend.Logout')}} "><i
                                            class="fas fa-power-off"></i></a>
                                </div>
                            </div>
                        </div>
{{--                        <div class="profileNavCol row flex-wrap mb-2">--}}
{{--                            <a href="{{route('profile.CurrentOrders')}}" id="activeButton" class="  change_part_of_profile col loadTimer" > <i class="fa-solid fa-user-hair-mullet me-2 "></i> طلبات الاستقدام</a>--}}
{{--                            <a href="{{route('profile.OrdersHistory')}}" class="change_part_of_profile col"> <i class="fa-solid fa-user-headset me-2 "></i> سجل الطلبات </a>--}}
{{--                            <a href="{{route('profile.Notifications')}}" class="change_part_of_profile col"> <i class="fas fa-bell me-2 "></i> الاشعارات </a>--}}
{{--                            <a href="{{route('profile.editProfile')}}" class="change_part_of_profile col"><i class="fas fa-cog me-2 "></i> اعدادات الحساب </a>--}}
{{--                            <a href="{{route('auth.logout')}}" class="col"><i class="fas fa-power-off me-2 "></i> {{__('frontend.Logout')}}   </a>--}}
{{--                        </div>--}}

                    </div>
                    <div class=" col-lg-9 p-2 profileContent">

                            <!-- ================ routeNav ================= -->
                            <div class="routeNav">
                                <button onclick="history.back()" class="Back">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                                <ul>
                                    <li>
                                        <a href="{{route('auth.profile')}}"> طلبات الاستقدام </a>
                                    </li>
                                    <li>
                                        <a href="#!" class="active"> تفاصيل الطلب </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- ================ /routeNav ================= -->
                            <!-- status -->
                            <div class="status">
                                <ol>
                                    <li @if(in_array($order->status,['new','under_work','contract','musaned','traning','visa','finished'])) class="completed" @endif >
                                        <p>اختيار العمالة </p>
                                    </li>
                                    <li @if(in_array($order->status,['under_work','contract','musaned','traning','visa','finished'])) class="completed" @endif>
                                        <p>حجز السيره الذاتية </p>
                                    </li>
                                    <li @if(in_array($order->status,['contract','musaned','traning','visa','finished'])) class="completed" @endif>
                                        <p>ابرام التعاقد </p>
                                    </li>
                                    <li @if(in_array($order->status,['musaned','traning','visa','finished'])) class="completed" @endif>
                                        <p> مساند </p>
                                    </li>
                                    <li @if(in_array($order->status,['traning','visa','finished'])) class="completed" @endif>
                                        <p> تحت الاجراءات </p>
                                    </li>
                                    <li @if(in_array($order->status,['visa','finished'])) class="completed" @endif>
                                        <p> تفييز العمالة </p>
                                    </li>
                                    <li @if(in_array($order->status,['finished'])) class="completed" @endif>
                                        <p>وصول العمالة </p>
                                    </li>
                                </ol>
                            </div>
                            <!-- order -->
                            <div class="order">
                                <div class="row">
                                    <div class="col-sm-6 p-2">
                                        <div class="swiper workerCvSlider ">
                                            <div class="swiper-wrapper">
                                                @foreach($order->biography->images as $image)
                                                    <!-- cv image -->
                                                    <div class="swiper-slide ">
                                                        <a data-fancybox="user{{$image->id}}-CV-{{$image->id}}" href="{{get_file($image->image)}}">
                                                            <img src="{{get_file($image->image)}}" alt="">
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <ul class="info">

                                            <li>
                                                <h6> {{__('frontend.Nationality')}} : </h6>
                                                <p>{{$order->biography->nationalitie?$order->biography->nationalitie->title:""}} </p>
                                            </li>
                                            <li>
                                                <h6> {{__('frontend.Occupation')}} : </h6>
                                                <p> {{$order->biography->job?$order->biography->job->title:""}} </p>
                                            </li>
                                            <li>
                                                <h6> حالة الاستقدام : </h6>
                                                @if ($order->status == "canceled")
                                                    <p> {{__('frontend.orderCanceled')}} </p>
                                                @elseif ($order->status == "under_work")
                                                    <p>تم حجز السيرة الذاتيه </p>
                                                @elseif ($order->status == "visa")
                                                    <p>اصبح التعاقد الخاص بكم  فى مرحلة التفييز بنجاح </p>
                                                @elseif ($order->status == "musaned")
                                                    <p>تم ربط العقد الخاص بكم في مساند بنجاح  </p>

                                                @elseif ($order->status == "traning")
                                                    <p>اصبح التعاقد الخاص بكم فى مرحلة الاجراءات بنجاح </p>

                                                @elseif ($order->status == "contract")
                                                    <p> تم قبول التعاقد الخاص بكم </p>

                                                @elseif($order->status == "finished")
                                                    <p> {{__('frontend.orderDone')}} </p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- customerInfo -->
                            <div class="selectedCustomerInfo">
                                <div class="row">
                                    <div class="col-md-6 p-1">
                                        <div class="info">
                                            <img src="{{asset('frontend')}}/img/avater2.webp" alt="">
                                            <div class="text">
                                                <h5> {{$order->admin->name}}  </h5>
                                                <p>خدمة العملاء</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 p-1">
                                        <a class="contact" href="https://api.whatsapp.com/send?phone={{$order->admin->whats_up_number}}" target="_blank">
                                            <i class="me-2 fa-brands fa-whatsapp-square"></i>
                                            <p>تواصل عبر الواتس اب</p>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-3 p-1">
                                        <a class="contact" href="tel:{{$order->admin->phone}}" target="_blank">
                                            <i class="me-2 fa-solid fa-square-phone"></i>
                                            <p>تواصل عبر الهاتف </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="selectedCustomer">
                                <h6>سوف توصل العمالة فى خلال <span> 90 </span> يوم كحد اقصى </h6>

{{--                                <h6> تم ابرام التعاقد وفي انتظار اصدار التاشيرة لعاملتك </h6>--}}
                                <!-- button for modal -->



                            </div>
                        </div>
                    </div>
                </div>

        </section>
    </content>
<content>
    <!-- ================ profile ================= -->





</content>
@endsection
@section('js')
    <script>
        var  ProfileLoader = `<div class="linear-background3"></div>`;
        $(document).on('click',".change_part_of_profile",function (e) {
            e.preventDefault()
            //add
            $(".change_part_of_profile").removeClass('active');
            $(this).addClass('active');
            var link = $(this).attr('href');
            $.get(link, function(data) {
                $('#display_profile_part').empty();
                $('#display_profile_part').append(ProfileLoader)
                window.setTimeout(function() {
                    $('#display_profile_part').empty();
                    $('#display_profile_part').append(data['html']);
                    loadTimer()
                    $('.select2').select2();
                    $('.dropify').dropify();
                    $.validate({
                        ignore: 'input[type=hidden]',
                        modules : 'date, security',
                        lang:"{{ LaravelLocalization::getCurrentLocale() }}",
                    });
                }, 300);
            });
        })
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_current_orders_button',function (e){

            e.preventDefault()
            var current_orders_page = parseInt(document.getElementById("current_page_orders").value) + 1;
            loadMoreDataFormCurrentOrders(current_orders_page);
        })//end fun
        function loadMoreDataFormCurrentOrders(current_orders_page) {
            var url = '{{route('front.loadMoreCurrentOrders')}}?page=' + current_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_current_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_current_orders_button").remove();
                    }
                    else {
                        document.getElementById("current_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#current_orders_section_to_append').append(data.html);
                        loadTimer()
                        //   $(".spinner").hide()
                        $('#load_more_current_orders_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                         `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more cases
        $(document).on('click','#load_more_notifications_button',function (e){
            e.preventDefault()
            var notifications_page = parseInt(document.getElementById("current_page_notifications").value) + 1;
            loadMoreDataFormNotification(notifications_page);
        })//end fun
        function loadMoreDataFormNotification(notifications_page) {
            var url = '{{route('profile.loadMoreNotifications')}}?page=' +notifications_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //  $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_notifications_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_notifications_button").remove();
                    }
                    else {
                        document.getElementById("current_page_notifications").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#notifications_section_to_append').append(data.html);
                        // $(".spinner").hide()
                        $('#load_more_notifications_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                           `
                        )
                    }, 20);
                },
                error: function (data) {
                    // $(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_history_orders_button',function (e){
            e.preventDefault()
            var history_orders_page = parseInt(document.getElementById("history_page_orders").value) + 1;
            loadMoreDataFormHistoryOrders(history_orders_page);
        })//end fun
        function loadMoreDataFormHistoryOrders(history_orders_page) {
            var url = '{{route('front.loadMoreOrdersHistory')}}?page=' + history_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_history_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_history_orders_button").remove();
                    }
                    else {
                        document.getElementById("history_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#history_orders_section_to_append').append(data.html);
                        //   $(".spinner").hide()
                        $('#load_more_history_orders_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                         `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        var timeOfSendingCode = 0;
        // Add validator
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(5)(5|0|3|6|4|9|1|8|7|2)([0-9]{7})$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });
        $.formUtils.addValidator({
            name : 'repeatPassword',
            validatorFunction : function(value, $el, config, language, $form) {
                return value == $("#password").val()
            },
            errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
            errorMessageKey: 'repeatPasswordKey'
        });
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).on('click','.passwordEye',function(e) {
            $(this).find('.far').toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).closest('.passwordDiv').find('.passwordInput'));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        //update basic info of user
        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $("#Form").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                        //  $("#user_info_in_header").attr("src",data.user.logo_link);
                        $("#user_logo_in_profile").attr("src",data.user.logo_link);
                        $("#user_name_in_profile").html(data.user.name);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled',false)
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 400) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the email is already exists')}}",
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
        //update password of user
        $(document).on('submit','form#FormPassword',function(e) {
            e.preventDefault();
            var myForm = $("#FormPassword")[0]
            var formData = new FormData(myForm)
            var url = $("#FormPassword").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_buttonPassword').attr('disabled',true)
                    $('#submit_buttonPassword').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                        // $("#user_info_in_header").attr("src",data.user.logo_link);
                        // $("#user_info_in_profile").attr("src",data.user.logo_link);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_buttonPassword').attr('disabled',false)
                        $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_buttonPassword').attr('disabled',false)
                    $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.there ar an error')}}",
                            timer: 3000
                        })
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        var codeSentToMobile
        $(document).on('submit','form#ChangePhoneForm',function(e) {
            e.preventDefault();
            $("#phoneInCode").val($("#Phone").val())
            var myForm = $("#ChangePhoneForm")[0]
            var formData = new FormData(myForm)
            var url = $('#ChangePhoneForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button_for_phone_change').attr('disabled',true)
                    $('#submit_button_for_phone_change').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Code Is Sent to Your phone')}}",
                            timer: 3000
                        })
                        $('#submit_button_for_phone_change').attr('disabled',false)
                        $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                        codeSentToMobile = data
                        $("#registerForm").hide()
                        $("#CodeForm").show()
                        document.getElementById("vCodeIdFirst").focus();
                        timeOfSendingCode++
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button_for_phone_change').attr('disabled',false)
                    $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
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
    <script>
        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");
            //bind events
            $inputs.on('keyup', processInput);
            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }
                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }
            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }
        })();
        $(document).on('submit','form#CompleteRegister',function(e) {
            e.preventDefault();
            const codeHere = [];
            var inputs = $(".vCode-input");
            for(var i = 0; i < inputs.length; i++){
                if ($(inputs[i]).val() == '' || $(inputs[i]).val() == null){
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.please , fill all input with correct code')}}",
                        timer: 3000
                    })
                    return 0
                }else{
                    codeHere.push($(inputs[i]).val());
                }
            }
            if (codeSentToMobile != codeHere.join('')){
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.this code is wrong')}}",
                    timer: 3000
                })
                return 0;
            }
            $("#codeInCode").val(codeSentToMobile)
            var myForm = $("#CompleteRegister")[0]
            var formData = new FormData(myForm)
            var url = $('#CompleteRegister').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#CompleteRegisterButton').attr('disabled',true)
                    $('#CompleteRegisterButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#CompleteRegisterButton').attr('disabled',false)
                        $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                        location.reload()
                    }, 2000);
                },
                error: function (data) {
                    $('#CompleteRegisterButton').attr('disabled',false)
                    $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
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
        $(document).on('click',"#registerAgain",function (e){
            e.preventDefault()
            $("#registerForm").show()
            $("#CodeForm").hide()
            document.getElementById("vCodeIdFirst").blur();
        })
        $(document).on('click',"#sendCodeAgain",function (e){
            e.preventDefault()
            if ( $("#sendCodeAgain").attr('attr-code-sent') == 'sent')
            {
                $('#sendCodeAgain').html(`<i class='fa fa-spinner fa-spin '></i>`)
                window.setTimeout(function() {
                    $("#codeReceiveOrNot").html("{{__('frontend.CodeIsSentAgain')}}")
                    $("#Form").submit()
                    countdown(1)
                    $("#sendCodeAgain").attr('attr-code-sent',"no_send")
                }, 1000);
            }else{
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.Please wait until the time is up')}}",
                    timer: 3000
                })
                return 0;
            }
        })
        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1
            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                // our seconds have run out
                if(seconds <= 0) {
                    // our minutes have run out
                    if(current_minutes <= 0) {
                        // we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
                        // otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }
                // we set our interval to a second.
            }, 1000);
        }


        function loadTimer()
        {
            $(document).find('.timer').each(function (index){
                var date = $(this).data('date')
                var id = $(this).data('id')
                var countDownDate = new Date(date).getTime();
                setInterval(function () {
                    var now = new Date().getTime();
                    var timeLeft = countDownDate - now;
                    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    // Result is output to the specific element
                    document.getElementById("days"+id).innerHTML = days + "<span> يوم </span>";
                    document.getElementById("hours"+id).innerHTML = hours + "<span> ساعة </span> "
                    document.getElementById("minutes"+id).innerHTML = minutes + " <span> دقيقة </span> "
                    document.getElementById("seconds"+id).innerHTML = seconds + "<span> ثانية </span> "
                }, 1000);
            })
        }
    </script>
    <script>
        $('#activeButton').click();

    </script>

    {{--<script>--}}
    {{--        var countDownDate = new Date("oct 25, 2022 16:00:00").getTime();--}}
    {{--        var myFunc = setInterval(function () {--}}
    {{--        var now = new Date().getTime();--}}
    {{--        var timeLeft = countDownDate - now;--}}
    {{--        var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));--}}
    {{--        var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
    {{--        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));--}}
    {{--        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);--}}
    {{--        // Result is output to the specific element--}}
    {{--        document.getElementById("days").innerHTML = days + "<span> يوم </span>";--}}
    {{--        document.getElementById("hours").innerHTML = hours + "<span> ساعة </span> "--}}
    {{--        document.getElementById("minutes").innerHTML = minutes + " <span> دقيقة </span> "--}}
    {{--        document.getElementById("seconds").innerHTML = seconds + "<span> ثانية </span> "--}}
    {{--        }, 1000);--}}
    {{--    </script>--}}
@endsection
