@foreach($currentOrders as $key=>$currentOrder)
    <div class="col-lg-6 p-2">
        <div class="order">
            <div class="row">
                <div class="col-sm-6 p-2">
                    <div class="swiper workerCvSlider ">
                        <div class="swiper-wrapper">
                            <!-- cv image -->
                            <div class="swiper-slide ">
                                <a data-fancybox="{{$currentOrder->biography->id}}"
                                   href="{{get_file($currentOrder->biography->cv_file)}}">
                                    <img src="{{get_file($currentOrder->biography->cv_file)}}" height="50px">
                                </a>
                            </div>

                            @foreach($currentOrder->biography->images as $image)
                                <!-- cv image -->

                                <div class="swiper-slide ">
                                    <a data-fancybox="{{$currentOrder->biography->id}}"
                                       href="{{get_file($image->image)}}">
                                        <img src="{{get_file($image->image)}}" height="50px">
                                    </a>
                                </div>

                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-sm-6 p-2">
                    <ul class="info">
                        <li>
                            <h6> {{__('frontend.Nationality')}} </h6>
                            <p>{{$currentOrder->biography->nationalitie?$currentOrder->biography->nationalitie->title:""}} </p>
                        </li>
                        <li>
                            <h6>{{trans('frontend.job')}} </h6>
                            <p> {{$currentOrder->biography->job?$currentOrder->biography->job->title:""}} </p>
                        </li>
                        <li>
                            <h6>{{__('frontend.RecruitmentStatus')}} </h6>
                            <p> {{__('frontend.RecruitmentCurrent')}} </p>
                        </li>

                    </ul>
                </div>
            </div>

            @php

                $date =$currentOrder->created_at;
               $newDate = date('Y-m-d H:i:s', strtotime($date. '+24 hours'));
            @endphp

            <div id="timer{{$currentOrder->id}}" data-date="{{$newDate}}" data-id="{{$currentOrder->id}}" class="timer">
                <div id="days{{$currentOrder->id}}"></div>
                <div id="hours{{$currentOrder->id}}"></div>
                <div id="minutes{{$currentOrder->id}}"></div>
                <div id="seconds{{$currentOrder->id}}"></div>
            </div>


            <div class="profileCustomerInfo">
                <div class="info">
                    <img src="{{asset('frontend')}}/img/customer-service.png" alt="">
                    <div class="text">
                        <h6> {{$currentOrder->admin->name}} </h6>
                        <p>{{__('frontend.customerSupport')}}</p>
                    </div>
                </div>
                <div class="contact">
                    <a href="{{route('profile.getOrder',$currentOrder->id)}}" target="_blank">
تفاصيل الطلب
                    </a>
{{--                    <a href="https://api.whatsapp.com/send?phone={{$currentOrder->admin->whats_up_number}}" target="_blank">--}}
{{--                        <i class="fa-brands fa-whatsapp"></i>--}}
{{--                    </a>--}}
                </div>

            </div>
        </div>
    </div>

    <script>
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

    </script>
@endforeach

