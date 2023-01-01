<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        {{$settings->title??"الجوهرة"}} - @yield('title')
    </title>

    {{--here we will add --}}
    <!-- icon -->
    @include('frontend.layouts.assets._css')
    <link rel="stylesheet" media="all" href="{{asset('frontend')}}/cute-alert-master/style.css"/>
    @yield('styles')

    <style>
        @keyframes placeHolderShimmer{
            0%{
                background-position: -468px 0
            }
            100%{
                background-position: 468px 0
            }
        }
        .linear-background {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 338px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;

        }


        .linear-background2 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;

        }

        .linear-background3 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

    </style>
</head>

<body>

<!-- custom cursor  -->
<div class="customCursor"></div>
<div class="customCursorInner"></div>
<!-- end custom cursor  -->
<!-- loader -->
<div class="loader">
    <svg viewBox="0 0 194.38 194.38">
        <path class="cls-1" fill="#dcb065"
              d="M176.82,176.82C149.66,204,50.34,204,23.18,176.82S-4,50.34,23.18,23.18,149.66-4,176.82,23.18s27.16,126.48,0,153.64"
              transform="translate(-2.81 -2.81)" />
        <path class="cls-2" fill="#09463f"
              d="M138.65,48.06a2.57,2.57,0,0,0-.21-.24l-.31-.25-.28-.19a3.29,3.29,0,0,0-.39-.17l-.27-.1a2.82,2.82,0,0,0-.7-.1H63.55a3,3,0,0,0-.74.1l-.17.07a2.91,2.91,0,0,0-.51.22,1.88,1.88,0,0,0-.18.12,3.12,3.12,0,0,0-.4.32L61.4,48a2.09,2.09,0,0,0-.2.22L44.94,71.29a2.88,2.88,0,0,0,0,3.27l52.72,77.76a2.87,2.87,0,0,0,4.75,0l15.94-23.52,36.77-54.24a2.88,2.88,0,0,0,0-3.27L138.81,48.23C138.76,48.16,138.7,48.12,138.65,48.06Zm-7.6,4.69L115.92,75.08,100.79,52.75Zm-37.2,0,18.6,27.45L100,98.55,69,52.75ZM100,145.6,50.78,73,63.5,54.93l1,1.47,48,70.79Zm16-23.53-12.47-18.4,4.08-6,28.95-42.72L149.22,73Z"
              transform="translate(-2.81 -2.81)" />
        <path class="cls-3" fill="#09463f"
              d="M145.4,32.65H54.61L26.35,72.75,100,181.42,173.65,72.76h0ZM100,171.18,74.56,133.64,33.33,72.82,57.59,38.4h84.83l24.25,34.42Z"
              transform="translate(-2.81 -2.81)" />
    </svg>
    <div class="spinner"></div>
</div>
<!-- ================ Header ================= -->
@include('frontend.layouts.inc._header')
<!-- ================ /Header ================= -->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((((( content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<content>

    @yield('content')

    <div class="modal fade cvModal" id="showDetails" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="CVHere">

            </div>
        </div>
    </div>


</content>
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((( / content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!-- ================ Footer ================= -->
@include('frontend.layouts.inc._footer')
<!-- ================ /Footer ================= -->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
@include('frontend.layouts.assets._js')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('js')


<script>

    var cv_loader = ` <div class="linear-background"></div>`;


    $(document).on('click','.cvDetails',function (e) {
        e.preventDefault()
        var id = $(this).attr('attr-id');
        var url = '{{route('front.show-worker-details',":id")}}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                $("#CVHere").html(cv_loader)
                $('#showDetails').modal('show')
                //$(".spinner").show()
            },
            success: function(data){
                //$(".spinner").hide()
                window.setTimeout(function() {
                    $('#CVHere').html(data.html);
                }, 1000);
                new Swiper(".workerCvSlider", {
                    spaceBetween: 0,
                    centeredSlides: true,
                    // loop: true,
                    speed: 1000,
                    pagination: {
                        el: ".workerCvSliderpagination",
                        clickable: true,
                    },
                    keyboard: {
                        enabled: true,
                    },
                    navigation: {
                        nextEl: ".workerCvSliderNext",
                        prevEl: ".workerCvSliderPrev",
                    },
                });
            },
            error: function(data) {
                $('#showDetails').modal('hide')
                alert('{{__('frontend.errorTitleAuth')}}')
            }
        });

    });

    $(document).on('click','.Recruitment_Request',function (e){
        e.preventDefault()
        var ob = $(this)
        var id = $(this).attr('attr-id');
        var url = '{{route('front.completeTheRecruitmentRequest',":id")}}';

        var customer_support = $("#customerSupport .customerSupport:checked").val()
        @if(auth()->check())
            if(customer_support == '' ||customer_support == null)
            {
                cuteToast({
                    type: "warning", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.please Select From Customer Support')}}",
                    timer: 3000
                })
                return 0 ;
            }
        url = url.replace(':id', id)+"?customerSupport="+customer_support;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                ob.attr('disabled',true)
                ob.html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            success: function(data){
                ob.attr('disabled',false)
                ob.html(`{{__('frontend.Recruitment Request')}}
                    <i class="fa-solid fa-briefcase ms-2"></i>`)
                cuteAlert({
                    title: "{{__('frontend.Congratulation')}}",
                    message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                    type: "success", // or 'info', 'error', 'warning'
                    buttonText: "{{__('frontend.ok')}}"
                }).then((e)=>{
                    location.replace("{{route('auth.profile')}}")
                })

            },
            error: function(data) {
                ob.html(`{{__('frontend.Recruitment Request')}}
                <i class="fa-solid fa-briefcase ms-2"></i>`)
                if (data.status === 400) {
                    cuteToast({
                        type: "warning", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.this worker had reserved')}}",
                        timer: 3000
                    })
                }

                if (data.status === 500) {
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.there ar an error')}}",
                        timer: 3000
                    })
                }
            }
        });


        @else
        {{--cuteAlert({--}}
        {{--    type: "question",--}}
        {{--    title: "{{__('frontend.AlertNotificationForAuth')}}",--}}
        {{--    message: "{{__('frontend.AlertMessageForAuthComplete')}}",--}}
        {{--    confirmText: "{{__('frontend.Login')}}",--}}
        {{--    cancelText: "{{__('admin.cancel')}}"--}}
        {{--}).then((e)=>{--}}
        {{--    if ( e == 'confirm'){--}}
        {{--        location.replace("{{route('auth.login')}}")--}}
        {{--    }--}}
        {{--})--}}

        var url="{{route('register',':id')}}";
        url=url.replace(':id',id);
        location.replace(url);

        @endif


    });
</script>

@if(LaravelLocalization::getCurrentLocale() == 'ar')
<script src="{{asset('frontend/jQuery-Form-Validator/form-validator/lang/ar.js')}}"></script>
@else
<script src="{{asset('frontend/jQuery-Form-Validator/form-validator/jquery.form-validator.js')}}"></script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="{{asset('frontend')}}/cute-alert-master/cute-alert.js"></script>

<script>
    $.validate({
        ignore: 'input[type=hidden]',
        modules : 'date, security',
        lang:"{{ LaravelLocalization::getCurrentLocale() }}",
    });

</script>
<script>
    $(document).on('click','.ignoreHref',function (e){
        e.preventDefault();
    })
</script>
{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        if ("serviceWorker" in navigator) {--}}
{{--            navigator.serviceWorker.register("service-worker.js");--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

</body>
@toastr_render
</html>
